<?php

namespace App\Http\Livewire\Dictionary;

use App\Models\Category;
use App\Models\Dictionary;
use Livewire\Component;
use Livewire\WithPagination;

class DictionaryList extends Component
{
    use WithPagination;

    public $categories = [];

    public $isUpdate = false;
    public $pageSize = 10;

    public $search;
    public $searchType = '';
    public $searchCategory = '';

    protected $listeners = [
        'storeDictionary' => 'handleStored',
        'updateDictionary' => 'handleUpdated'
    ];

    public function mount()
    {
        $categories = Category::all()->toArray();
        $this->categories = $categories;
    }

    public function render()
    {
        $dictionaries = Dictionary::latest();

        if ($this->searchType)
            $dictionaries = $dictionaries->where('type', '=', $this->searchType);

        if ($this->searchCategory)
            $dictionaries = $dictionaries->where('category_id', '=', $this->searchCategory);

        if ($this->search)
            $dictionaries = $dictionaries->where('vocab_id', 'LIKE', '%' . $this->search . '%')
                                    ->orWhere('vocab_en', 'LIKE', '%'. $this->search . '%');

        $dictionaries = $dictionaries->with(['category'])
            ->paginate($this->pageSize);

        return view('livewire.dictionary.dictionary-list',
            ['dictionaries' => $dictionaries]);
    }

    public function handleStored($dictionary)
    {
        session()->flash('success', 'Create dictionary was created');
    }

    public function handleUpdated($category)
    {
        session()->flash('success', 'Update $dictionary was updated');
    }

    public function handleEdit($id)
    {
        $this->isUpdate = true;
        $dictionary = Dictionary::find($id);
        $this->emit('editDictionary', $dictionary);
    }

    public function handleDelete($id)
    {
        $dictionary = Dictionary::find($id);

        if ($dictionary) {
            $dictionary->delete();
            session()->flash('success', 'Dictionary was deleted');
        }
    }
}
