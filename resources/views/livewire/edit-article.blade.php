<div class="m-auto w-1/2 text-gray-200 mb-4">
    <h3 class="text-lg text-gray-200 mb-3">Edit Article</h3>
    <form wire:submit="save">
        <div class="mb-3">
            <label wire:dirty.class='text-orange-400' wire:target='form.title' class="block text-white" for="article-title">
                Title<span wire:dirty wire:target='form.title'>*</span>
            </label>
            <input type="text" class="p-2 w-full border rounded-md bg-gray-700 text-white" wire:model="form.title">
            <div>
                @error('form.title')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class=" mb-3">
            <label class="block text-white" wire:dirty.class='text-orange-400' wire:target='form.conent'
                for="article-content">
                Content <span wire:dirty wire:target='form.content'>*</span>
            </label>
            <textarea id="article-content" class="p-2 w-full border rounded-md bg-gray-700 text-white" wire:model="form.content"></textarea>
            <div>
                @error('form.content')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="block text-white">
                Photo
            </label>
            <div class="flex items-center">
                <input type="file" wire:model="form.photo">

                <div>
                    @if ($form->photo)
                        <!-- New photo uploaded -->
                        <img class="w-1/2" src="{{ $form->photo->temporaryUrl() }}" alt="Temporary Image">
                    @elseif ($form->photo_path)
                        <!-- Previously saved photo -->
                        <img class="w-1/2" src="{{ Storage::url($form->photo_path) }}" alt="Stored Image">
                        <div class="mt-2">
                            <button
                            type="button"
                            class="text-gray-200 p-1 bg-blue-700 hover:bg-blue-900 rounded-sm"
                            wire:click="downloadPhoto"
                            >
                                Download
                            </button>
                        </div>
                    @endif
                </div>
            </div>


            <div>
                @error('form.photo')
                    <span class="text-red-600">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label class="flex items-center">
                <input type="checkbox" wire:model.boolean='form.published' value="published" class="mr-2">
                Published <span wire:dirty wire:target='form.published'>*</span>
            </label>
        </div>
        <div class="mb-3">
            <div>
                <div class="mb-2">
                    Notification Options <span wire:dirty wire:target='form.isAllowedNotification'>*</span>
                </div>
                <div class="flex gap-6 mb-2">
                    <label class=" items-center">
                        <input type="radio" class="mr-2" wire:model.boolean="form.isAllowedNotification"
                            value="true">Yes
                    </label>
                    <label class=" items-center">
                        <input type="radio" class="mr-2" wire:model.boolean="form.isAllowedNotification"
                            value="no">No
                    </label>
                </div>
                <div x-show="$wire.form.isAllowedNotification" wire:transition.opacity>
                    <label class=" flex items-center mb-1">
                        <input type="checkbox" class="mr-2" wire:model="form.notifications" value="email">Email
                    </label>
                    <label class=" flex items-center mb-1">
                        <input type="checkbox" class="mr-2 flex" wire:model="form.notifications" value="sms">SMS
                    </label>
                    <label class=" flex items-center mb-1">
                        <input type="checkbox" class="mr-2" wire:model="form.notifications" value="push">Push
                    </label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button class="text-gray-200 p-2 bg-indigo-700  rounded-sm" type="submit">
                Update
            </button>
        </div>
    </form>
</div>
