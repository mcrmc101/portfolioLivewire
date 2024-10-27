<div>
    @if ($mimeType == 'video')
        <video src="{{ $media->getUrl() }}" autoplay muted loop
            @if (!$isMasonry) onclick="modal_{{ $media->id }}.showModal()" @endif></video>
        <dialog id="modal_{{ $media->id }}" class="modal bg-black">
            <div class="modal-box max-w-full bg-black">
                <video src="{{ $media->getUrl() }}" autoplay muted controls class="mx-auto h-full w-auto"></video>
                <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn btn-sm text-error">@include('icons.close') Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    @elseif($mimeType == 'audio')
        <audio controls>
            <source src="{{ $media->getUrl() }}">
        </audio>
    @else
        <img src="{{ $media->getUrl('web-image') }}" class="h-auto w-auto mx-auto cursor-pointer"
            alt="{{ $media->model->name }} main image"
            @if (!$isMasonry) onclick="modal_{{ $media->id }}.showModal()" @endif>
        <dialog id="modal_{{ $media->id }}" class="modal bg-black">
            <div class="modal-box max-w-full bg-black">
                <img src="{{ $media->getUrl('web-image') }}" class="h-full w-full mx-auto cursor-pointer"
                    alt="{{ $media->model->name }} main image">
                <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn btn-sm text-error">@include('icons.close') Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    @endif

</div>
