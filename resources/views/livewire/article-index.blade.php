<div class="w-1/2 m-auto bg-gray-800" >
    @foreach ($articles as $article)
        <div class="m-5 p-5 ">
            <h3 class="text-blue-400 mb-2 hover:text-blue-700 text-2xl">
              <a  href="/articles/{{ $article->id }}" wire:key="{{ $article->id }}" >{{ $article->title }} </a>
            </h3>
            <p class="text-gray-300">
                {{ str($article->content)->words(30) }}
            </p>
        </div>
    @endforeach
</div>
