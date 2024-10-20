@php
    $page = App\Models\Page::first();
    $name = $page->site_name;
    $tagline = $page->site_tagline;
    $logo = $page->getFirstMediaUrl('site_logo');
@endphp
<div class="navbar items-center mb-auto">
    <div class="navbar-start">
        @if ($logo)
            <img src="{{ $logo }}" alt="" class="h-10 md:h-16 opacity-90 rounded-full">
        @endif
        <a class="btn font-mono btn-ghost text-xl text-neutral-50" href="/">{{ $name }}</a>
    </div>
    <div class="navbar-end">
        <small class="text-neutral-50">{{ $tagline }}</small>
    </div>
</div>
