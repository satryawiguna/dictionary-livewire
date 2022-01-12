<?php

namespace App\Http\Livewire\Dictionary;

use App\Models\Category;
use App\Models\Dictionary;
use Livewire\Component;

class DictionaryCreate extends Component
{
    public $categories = [];

    public $type = 'word';
    public $category = '';
    public $vocab_id;
    public $vocab_en;

    protected $rules = [
        'type' => 'required',
        'category' => 'required',
        'vocab_id' => 'required',
        'vocab_en' => 'required'
    ];

    public function mount()
    {
        $categories = Category::all()->toArray();
        $this->categories = $categories;
    }

    public function render()
    {
        return view('livewire.dictionary.dictionary-create');
    }

    public function handleStore()
    {
        $this->validate();

        $dictionary = Dictionary::create([
            'type' => $this->type,
            'category_id' => $this->category,
            'vocab_id' => $this->vocab_id,
            'vocab_en' => $this->vocab_en
        ]);

        $this->handleClearFields();

        $this->emit('storeDictionary', $dictionary);
    }

    private function handleClearFields()
    {
        $this->type = null;
        $this->category = '';
        $this->vocab_id = null;
        $this->vocab_en = null;
    }
}
