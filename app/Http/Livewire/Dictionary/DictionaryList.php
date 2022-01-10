<?php

namespace App\Http\Livewire\Dictionary;

use App\Models\Category;
use App\Models\Dictionary;
use Livewire\Component;

class DictionaryList extends Component
{
    public $type;
    public $category = '';
    public $categories = [];

    public function mount()
    {
        $categories = Category::all()->toArray();
        $this->categories = $categories;
    }

    public function render()
    {
        $dictionaries = Dictionary::latest();

        return view('livewire.dictionary.dictionary-list', ['dictionaries' => $dictionaries]);
    }
}
