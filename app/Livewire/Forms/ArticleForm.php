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

    #[Validate('image|max:1024')]
    public $photo;

    public $published = false;
    public $notifications = [];

    public $isAllowedNotification = false;
    public $photo_path = '';

    public function setArticle(Article $article)
    {
        // Load article details including the photo path
        $this->title = $article->title;
        $this->content = $article->content;
        $this->published = $article->published;
        $this->notifications = $article->notifications ?? [];
        $this->isAllowedNotification = count($this->notifications) > 0;
        $this->photo_path = $article->photo_path;  // Load the existing photo path
        $this->article = $article;
    }


    public function update(){

        if(!$this->isAllowedNotification)
        {
            $this->notifications = [];

        }
        $this->validate();

        if($this->photo)
        {
            $this->photo_path = $this->photo->storePublicly('article_photos',['disk' => 'public']);
        }

        $this->article->update($this->only(['title','content', 'published' , 'notifications' , 'photo_path']));
        cache()->forget('published-count');
    }

    public function store()
    {
        $this->validate();
        if(!$this->isAllowedNotification)
        {
            $this->notifications = [];

        }
        if($this->photo)
        {
            $this->photo_path = $this->photo->storePublicly('article_photos',['disk' => 'public']);
        }
        Article::create($this->only(['title','content', 'published' , 'notifications','photo_path']));
        cache()->forget('published-count');
    }
}
