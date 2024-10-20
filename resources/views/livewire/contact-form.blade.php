<div class="w-10/12 mx-auto text-neutral-50">
    <form wire:submit="createMessage">
        <div class="flex flex-wrap">
            <div class="w-full">
                <h2 class="font-bold text-2xl md:text-4xl">Contact Us:</h2>
            </div>
            <div class="w-full md:w-1/3">
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text text-neutral-50">What is your name?</span>
                        <span class="label-text-alt text-error">*</span>
                    </div>
                    <input type="text" placeholder="Name" wire:model='name'
                        class="input input-bordered border-neutral-50 bg-inherit w-full max-w-xs" required />
                    <div class="label">

                    </div>
                </label>
            </div>
            <div class="w-full md:w-1/3">
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text text-neutral-50">What is your email?</span>
                        <span class="label-text-alt text-error">*</span>
                    </div>
                    <input type="email" placeholder="Email" wire:model='email'
                        class="input input-bordered border-neutral-50 bg-inherit w-full max-w-xs" required />
                    <div class="label">

                    </div>
                </label>
            </div>
            <div class="w-full md:w-1/3">
                <label class="form-control w-full max-w-xs">
                    <div class="label">
                        <span class="label-text text-neutral-50">What is your phone?</span>
                    </div>
                    <input type="text" placeholder="Phone" wire:model='phone'
                        class="input input-bordered border-neutral-50 bg-inherit w-full max-w-xs" />
                    <div class="label">

                    </div>
                </label>
            </div>
            <div class="w-full">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text text-neutral-50">Your Message</span>
                        <span class="label-text-alt text-error">*</span>
                    </div>
                    <textarea class="textarea bg-inherit textarea-bordered border-neutral-50 h-24" placeholder="Message"
                        wire:model="content" required></textarea>
                    <div class="label">

                    </div>
                </label>
            </div>
            <div class="w-full">
                <div class="form-control">
                    <button type="submit" class="btn btn-success">Send Message</button>
                </div>
            </div>
    </form>
</div>
