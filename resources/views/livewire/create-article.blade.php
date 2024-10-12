<div class="m-auto w-1/2 mb-4 text-gray-200">
    <h3 class="text-lg text-gray-200 mb-3">Create Article</h3>
    <form wire:submit="save">
        <div class="mb-3">
            <label class="block text-white" for="article-title">Title</label>
            <input
                type="text"
                class="p-2 w-full border rounded-md bg-gray-700 text-white"
                wire:model="form.title"
            >
            <div>
                @error('form.title') <span class="text-red-600"">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-3">
            <label class="block text-white" for="article-content">Content</label>
            <textarea
                id="article-content""
                class="p-2 w-full border rounded-md bg-gray-700 text-white"
                wire:model="form.content"
            ></textarea>
            <div>
                @error('form.content') <span class="text-red-600">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="mb-3">
            <div>
                <div class="mb-2">
                    Notification Options
                </div>
                <div class="flex gap-6 mb-2">
                    <label class=" items-center" >
                        <input type="radio" class="mr-2" wire:model.boolean="form.isAllowedNotification"  value="true">Yes
                    </label>
                    <label class=" items-center">
                        <input type="radio" class="mr-2" wire:model.boolean="form.isAllowedNotification"  value="no">No
                    </label>
                </div>
                <div x-show="$wire.form.isAllowedNotification">
                    <label class=" flex items-center mb-1" >
                        <input type="checkbox" class="mr-2" wire:model="form.notifications"  value="email">Email
                    </label>
                    <label class=" flex items-center mb-1">
                        <input type="checkbox" class="mr-2 flex" wire:model="form.notifications"  value="sms">SMS
                    </label>
                    <label class=" flex items-center mb-1">
                        <input type="checkbox" class="mr-2" wire:model="form.notifications"  value="push">Push
                    </label>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <button
            class="text-gray-200 p-2 bg-indigo-700 disabled:opacity-75 disabled:bg-blue-300  rounded-sm"
            type="submit"
            disabled
            wire:dirty.class='hover:bg-blue-900'
            wire:dirty.remove.attr='disabled'
        >
            Save
        </button>
        </div>
    </form>
</div>
