<div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($items as $item)
            <a href="{{ route('item.show', $item->slug) }}">
                <div class="card rounded-none" x-data="{ inView: false }" x-intersect="inView = true"
                    :class="{ 'fade-in': inView }">
                    <figure>
                        <img src="{{ $item->getFirstMediaUrl('main-image', 'web-image') }}"
                            alt="{{ $item->name }} main image" />
                    </figure>
                    <div class="card-body text-white" x-data="{ inView: false }" x-intersect="inView = true"
                        :class="{ 'flicker-in-1': inView }">
                        <h2 class="card-title">{{ $item->name }}</h2>


                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
