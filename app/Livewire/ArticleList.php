<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Session;
use Livewire\WithPagination;

class ArticleList extends AdminComponent
{
    use WithPagination;

    #[Session(key:'published')]
    public $showAllArticles = true;

    public function delete(Article $article){
        $article->delete();

        cache()->forget('published-count');
    }

    public function toggleAllArticles($value)
    {
        $this->showAllArticles = $value;
        $this->resetPage(pageName:'articles-page');
    }



    public function render()
    {
        $query = Article::query();
        if(!$this->showAllArticles){
            $query->where('published', 1);
        }
        return view('livewire.article-list' , [
            'articles' => $query->paginate(10 , pageName:'articles-page')
        ]);
    }
}
