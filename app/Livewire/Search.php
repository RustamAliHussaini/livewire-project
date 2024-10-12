<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Search extends Component
{
    #[Validate('required')]
    public $searchTerm = '';
    public $results = [];
    public $placeholder = '';

    public function updatedSearchTerm($value){
        $this->reset('results');
        $this->validate();

        $searchKey = "%{$value}%";

        $this->results = Article::where('title' , 'LIKE' , $searchKey)->get();
    }

    #[On('search:clear-results')]
    public function clear(){
        $this->reset('results', 'searchTerm');
    }

    public function render()
    {
        return view('livewire.search');
    }
}
