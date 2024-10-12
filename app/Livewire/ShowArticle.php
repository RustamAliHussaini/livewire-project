<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Psy\Readline\Hoa\Console;

class ShowArticle extends Component
{
    public $article;

    public function mount($id){

        $this->article = Article::findorFail($id);
    }
    public function render()
    {
        return view('livewire.show-article');
    }
}
