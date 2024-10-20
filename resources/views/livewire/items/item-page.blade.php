<div class="flex flex-col fade-in">
    <h1 class="font-bold text-5xl my-12 text-neutral-50 ms-6">{{ $item->name }}</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 items-center">
        <img src="{{ $item->getFirstMediaUrl('main-image', 'web-image') }}" class="h-auto w-auto mx-auto cursor-pointer"
            alt="{{ $item->name }} main image" onclick="modal_main.showModal()">
        <div class="text-neutral-50 p-4 prose prose-headings:text-neutral-50">
            <div class="md:mx-6 font-mono" x-data="{ inView: false }" x-intersect="inView = true"
                :class="{ 'flicker-in-1': inView }">
                {!! $item->description !!}</div>
        </div>
    </div>

    <dialog id="modal_main" class="modal bg-black">
        <div class="modal-box max-w-full bg-black">
            <img src="{{ $item->getFirstMediaUrl('main-image', 'web-image') }}"
                class="h-full w-full mx-auto cursor-pointer" alt="{{ $item->name }} main image">
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
    @if (count($item->getMedia('image-gallery')) > 0)

        <div class="columns-3 my-6 gap-0">
            @foreach ($item->getMedia('image-gallery') as $media)
                <img class="w-full cursor-pointer" src="{{ $media->getUrl('web-image') }}"
                    alt="{{ $item->name }} image {{ $loop->index }}" onclick="modal_{{ $media->id }}.showModal()">
                <dialog id="modal_{{ $media->id }}" class="modal bg-black">
                    <div class="modal-box max-w-full bg-black">
                        <img src="{{ $media->getUrl('web-image') }}" class="h-full w-full mx-auto cursor-pointer"
                            alt="{{ $item->name }} image {{ $loop->index }}">
                        <div class="modal-action">
                            <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="btn">Close</button>
                            </form>
                        </div>
                    </div>
                </dialog>
            @endforeach
        </div>
    @endif
</div>
</div>
