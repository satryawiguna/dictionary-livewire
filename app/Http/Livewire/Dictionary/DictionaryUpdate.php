<?php

namespace App\Http\Livewire\Dictionary;

use App\Models\Category;
use App\Models\Dictionary;
use Livewire\Component;

class DictionaryUpdate extends Component
{
    public $categories = [];

    public $dictionaryId;
    public $type;
    public $category;
    public $vocab_id;
    public $vocab_en;

    protected $rules = [
        'type' => 'required',
        'category' => 'required',
        'vocab_id' => 'required',
        'vocab_en' => 'required'
    ];

    protected $listeners = [
        'editDictionary' => 'handleEdit'
    ];

    public function mount()
    {
        $categories = Category::all()->toArray();
        $this->categories = $categories;
    }

    public function render()
    {
        return view('livewire.dictionary.dictionary-update');
    }

    public function handleEdit($dictionary)
    {
        $this->dictionaryId = $dictionary['id'];
        $this->type = $dictionary['type'];
        $this->category = $dictionary['category_id'];
        $this->vocab_id = $dictionary['vocab_id'];
        $this->vocab_en = $dictionary['vocab_en'];
    }

    public function handleUpdate()
    {
        $this->validate();

        if ($this->dictionaryId) {
            $dictionary = Dictionary::find($this->dictionaryId);
            $dictionary->update([
                'type' => $this->type,
                'category_id' => $this->category,
                'vocab_id' => $this->vocab_id,
                'vocab_en' => $this->vocab_en
            ]);

            $this->handleClearFields();

            $this->emit('updateDictionary', $dictionary);
        }
    }

    private function handleClearFields()
    {
        $this->type = 'word';
        $this->category = '';
        $this->vocab_id = null;
        $this->vocab_en = null;
    }
}
