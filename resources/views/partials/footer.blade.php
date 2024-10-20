@php
    $page = App\Models\Page::first();
    $name = $page->site_name;
    $tagline = $page->site_tagline;
    $logo = $page->getFirstMediaUrl('site_logo');
    $socials = collect($page->site_socials);
@endphp
<footer class="footer  text-neutral-50 items-center p-4 mt-6 font-mono">
    <aside class="grid-flow-col items-center">
        @if ($logo)
            <img src="{{ $logo }}" alt="" class="h-14 opacity-90 rounded-full">
        @endif
        <div>
            <a class="text-neutral-50" href="/">{{ $name }}</a>
            <p>Copyright © {{ now()->year }} - All right reserved</p>
        </div>
    </aside>
    @if (count($socials))
        <nav class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
            @foreach ($socials as $social)
                @php
                    $viewName = 'icons.' . str()->lower($social['name']);
                @endphp
                @if (view()->exists($viewName))
                    <a href="{{ $social['link'] }}" target="_blank">@include($viewName)</a>
                @endif
            @endforeach
        </nav>
    @endif

</footer>
