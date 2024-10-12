<div>

    <form action="" wire:submit="changeGreetingMessage()">

        <div class="m-t">

            <select type='text' class="p-4 px-10    border rounded-md bg-gray-700 text-white"
                wire:model.fill='greeting'>

                @foreach ($greetings as $item)
                        <option value="{{ $item->greeting }}">
                            {{ $item->greeting }}
                        </option>
                @endforeach
            </select>

            <input type="text" wire:model='name' name=""
                class=" my-4 p-4 border border-md bg-gray-500 text-white">


        </div>
        <div>
            @error('name')
            {{ $message }}
        @enderror
        </div>
        <div class="m-t">
            <button type="submit" class="text-white font-medium rounded-md px-4 py-2 bg-blue-700">
                Greet
            </button>
        </div>
    </form>


    @if ($greetingMessage !== '')
        <div>{{ $greetingMessage }} </div>
    @endif


</div>
