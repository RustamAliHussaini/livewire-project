<div class="{{ $show > 0 ? 'block' : 'hidden' }}">
    <div class="mt-5 p-4 absolute border rounded-md bg-gray-700 border-indigo-600 text-white">
        <div class="absolute top-0 right-0 pt-1 pr-3">
            <button type="button" wire:click="dispatch('search:clear-results ')">x</button>

        </div>

        @if (count($results) == 0)
            <p>No results found.</p>
        @endif

        @foreach ($results as $item)
            <div class="p-2">
             <a wire:navigate href="/articles/{{ $item->id }}" wire:key='{{ $item->id }}'>  {{ $item->title }}</a>
            </div>
        @endforeach
    </div>
</div>
