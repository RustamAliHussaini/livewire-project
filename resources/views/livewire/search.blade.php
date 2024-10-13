<div>

    <form >

        <div class="m-t">

            <input
                type="text"
                wire:model.live.debounce='searchTerm'
                placeholder="{{ $placeholder }}"
                class="w-full my-4 p-4 border border-md bg-gray-700 text-white"
                wire:offline.attr="disabled"


            >

        </div>

    </form>

    @if (!empty($searchTerm))
    <div wire:transition.scale.origin.top.left.duration.200ms>

        <livewire:search-results :results='$results' >
    </div>

    @endif




</div>
