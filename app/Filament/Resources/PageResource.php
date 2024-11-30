<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use RalphJSmit\Filament\SEO\SEO;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    /*

    protected function beforeCreate(): void
    {
        if (Page::all()->count() > 1) {
            $this->halt();
            Notification::make()
                ->warning()
                ->title('Only one page can be created.')
                ->send();
        }
    }
        */



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Site Details')
                    ->description('The info for the website, Name, Logo etc')
                    ->schema([
                        Forms\Components\TextInput::make('site_name')
                            ->required(),
                        Forms\Components\TextInput::make('site_tagline')
                            ->required(),
                        SpatieMediaLibraryFileUpload::make('site_logo')->label('Site Logo')
                            ->collection('site_logo'),
                        Repeater::make('site_socials')
                            ->helperText('Add your Social links here:')
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('link')->required(),
                            ])->columnSpanFull()
                    ])->columns(3),
                Section::make('Main Page')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)->live()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        Forms\Components\Hidden::make('slug'),
                        SpatieMediaLibraryFileUpload::make('image')->label('Page Main Image')
                            ->collection('image'),
                        Forms\Components\RichEditor::make('content')->label('Text Overlay Content')
                            ->toolbarButtons(config('app.toolbarButtons'))
                            ->required()
                            ->columnSpanFull(),
                    ]),

                Section::make('SEO')
                    ->description('Seo for the Page.  Very important for google!')
                    ->schema([
                        SEO::make(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('name'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
