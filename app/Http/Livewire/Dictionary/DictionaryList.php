<?php

namespace App\Http\Livewire\Dictionary;

use Livewire\Component;

class DictionaryList extends Component
{
    public $type;
    public $query;
    public $category;

    public function render()
    {
        return view('livewire.dictionary.dictionary-list');
    }
}
