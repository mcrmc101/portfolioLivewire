<div class="flex flex-col fade-in">
    @push('head')
        {!! seo()->for($item) !!}
    @endpush
    <h1 class="font-bold text-5xl my-12 text-neutral-50 ms-6">{{ $item->name }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 items-center">
        @livewire('items.item-image', [
            'mediaVar' => $item->getMedia('main-image')[0],
        ])
        <div class="text-neutral-50 p-4 prose prose-headings:text-neutral-50">
            <div class="md:mx-6 font-mono" x-data="{ inView: false }" x-intersect="inView = true"
                :class="{ 'flicker-in-1': inView }">
                {!! $item->description !!}</div>
        </div>
    </div>

    @if (count($item->getMedia('image-gallery')) > 0)

        <div class="columns-3 my-6 gap-0">
            @foreach ($item->getMedia('image-gallery') as $media)
                @livewire('items.item-image', [
                    'mediaVar' => $media,
                ])
            @endforeach
        </div>
    @endif
</div>
</div>
