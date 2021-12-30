<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    public $isUpdate = false;
    public $pageSize = 5;
    public $search;

    protected $listeners = [
        'storeCategory' => 'handleStored',
        'updateCategory' => 'handleUpdated'
    ];

    public function render()
    {
        $category = Category::latest();

        if ($this->search)
            $category = $category->where('name', 'LIKE', '%' . $this->search . '%');

        $category = $category->paginate($this->pageSize);

        return view('livewire.category.category-list', [
            'categories' => $category
        ]);
    }

    public function handleStored($category)
    {
        session()->flash('success', 'Create category ' . $category['name'] . ' was created');
    }

    public function handleUpdated($category)
    {
        session()->flash('success', 'Update category ' . $category['name'] . ' was updated');
    }

    public function handleEdit($id)
    {
        $this->isUpdate = true;
        $category = Category::find($id);
        $this->emit('editCategory', $category);
    }

    public function handleDelete($id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            session()->flash('success', 'Category was deleted');
        }
    }
}
