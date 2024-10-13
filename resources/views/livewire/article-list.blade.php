<div class="w-1/3 m-auto">

    <div class="mb-3 flex justify-between">

            <a href="/dashboard/articles/create"
                class="text-gray-200
            p-2
            bg-indigo-700 hover:bg-indigo-900 rounded-sm

        "
                wire:navigate>
                Create Article
            </a>


        <div class="text-gray-300">
            <button wire:click='toggleAllArticles(true)'

            @class([
                'text-gray-200 p-2 hover:bg-blue-900 rounded-sm',
                'bg-blue-700' => $showAllArticles,
                'bg-gray-700' => !$showAllArticles,
             ])

            >
                Show All
            </button>
            <button wire:click='toggleAllArticles(false)'
            @class([
                'text-gray-200 p-2 hover:bg-blue-900 rounded-sm',
                'bg-gray-700' => $showAllArticles,
                'bg-blue-700' => !$showAllArticles,
             ])
            >
                Show Published (<livewire:published-count placeholder-text="loading">)
            </button>

        </div>

    </div>

    @if (session('status'))
    <div class="text-center bg-green-700 text-gray-200">
        {{ session('status') }}
    </div>

    @endif

    <div class="my-3 text-gray-300">
        {{ $articles->links(data:['scrollTo' => 'table.w-full']) }}
    </div>

    <table class="w-full" >
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr class="border-b border-gray-700 text-gray-400 bg-gray-800">
                    <td class="px-6 py-3">{{ $article->title }}</td>
                    <td class="px-6 py-3">
                        <a href="/dashboard/articles/{{ $article->id }}/edit" wire:navigate>
                            Edit
                        </a>
                        <button class="text-gray-200 rounded-sm p-2 bg-red-700 hover:bg-red-900 "
                            wire:click="delete({{ $article->id }})" wire:confirm="Are sure to delete this article?">
                            Delete
                        </button>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>



</div>
