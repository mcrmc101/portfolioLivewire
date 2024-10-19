<div>
    <div class="hero min-h-screen" id="background-container"
        style="background-image: url({{ $page->getFirstMediaUrl('image', 'web-image') }});">

        <div class=" flex items-start max-w-10/12 ">
            <div class="ml-6 max-sm:mt-24 w-3/4" id="overlay-text" x-data="{ inView: false }" x-intersect="inView = true"
                :class="{ 'flicker-in-1': inView }">
                <h1 class="mb-5 text-xl md:text-5xl font-bold">{{ $page->name }}</h1>
                <div class="mb-5">
                    {!! $page->content !!}
                </div>

            </div>
        </div>
    </div>
    @livewire('items.item-masonry')



</div>
<script>
    function adjustTextColor() {
        const backgroundContainer = document.getElementById('background-container');
        const bgImageUrl = window.getComputedStyle(backgroundContainer).backgroundImage.slice(5, -2);

        // Create a temporary image element
        const img = new Image();
        img.src = bgImageUrl;

        img.onload = function() {
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');

            canvas.width = img.width;
            canvas.height = img.height;
            context.drawImage(img, 0, 0, img.width, img.height);

            const imageData = context.getImageData(0, 0, img.width, img.height);
            const data = imageData.data;

            let totalBrightness = 0;

            // Calculate brightness based on pixel data
            for (let i = 0; i < data.length; i += 4) {
                const r = data[i];
                const g = data[i + 1];
                const b = data[i + 2];

                // Formula for relative luminance (0.2126*R + 0.7152*G + 0.0722*B)
                const brightness = 0.2126 * r + 0.7152 * g + 0.0722 * b;
                totalBrightness += brightness;
            }

            const avgBrightness = totalBrightness / (img.width * img.height);

            const overlayText = document.getElementById('overlay-text');

            // Adjust text color based on brightness
            if (avgBrightness > 128) {
                overlayText.style.color = 'black'; // Dark text for light background
            } else {
                overlayText.style.color = 'white'; // Light text for dark background
            }
        };
    }

    // Adjust text color after page load
    window.onload = adjustTextColor;
</script>
