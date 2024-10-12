<?php

namespace App\Livewire\Forms;

use App\Models\Article;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Pest\Plugins\Only;

class ArticleForm extends Form
{
    public ?Article $article;

    #[Validate('required')]
    public $title ='' ;

    #[Validate('required')]
    public $content='';

    public $published = false;
    public $notifications = [];

    public $isAllowedNotification = false;


    public function setArticle(Article $article)
    {
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        $this->notifications = $article->notifications ?? [];
        $this->isAllowedNotification = count($this->notifications) > 0 ;

        $this->article = $article;
    }

    public function update(){

        if(!$this->isAllowedNotification)
        {
            $this->notifications = [];

        }
        $this->validate();
        $this->article->update($this->only(['title','content', 'published' , 'notifications']));
    }

    public function store()
    {
        $this->validate();
        if(!$this->isAllowedNotification)
        {
            $this->notifications = [];

        }
        Article::create($this->only(['title','content', 'published' , 'notifications']));

    }
}
