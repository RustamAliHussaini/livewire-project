<div>

    <form >

        <div class="m-t">

            <input
                type="text"
                wire:model.live.debounce='searchTerm'
                placeholder="{{ $placeholder }}"
                class="w-full my-4 p-4 border border-md bg-gray-700 text-white"


            >

        </div>

    </form>

   <livewire:search-results :results='$results' :show="!empty($searchTerm)">




</div>
