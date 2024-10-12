<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\WithPagination;

class ArticleList extends AdminComponent
{
    use WithPagination;

    public $showAllArticles = true;

    public function delete(Article $article){
        $article->delete();
    }

    public function showAll(){
        $this->showAllArticles = true;
        $this->resetPage(pageName:'articles-page');
    }

    public function showPublished(){
        $this->showAllArticles = false;
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
