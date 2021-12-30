<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryUpdate extends Component
{
    public $categoryId;
    public $name;

    protected $rules = [
        'name' => 'required|string'
    ];

    protected $listeners = [
        'editCategory' => 'handleEdit'
    ];

    public function render()
    {
        return view('livewire.category.category-update');
    }

    public function handleEdit($category)
    {
        $this->categoryId = $category['id'];
        $this->name = $category['name'];
    }

    public function handleUpdate()
    {
        $this->validate();

        if ($this->categoryId) {
            $category = Category::find($this->categoryId);
            $category->update([
                'name' => $this->name
            ]);

            $this->handleClearFields();

            $this->emit('updateCategory', $category);
        }
    }

    private function handleClearFields()
    {
        $this->name = null;
    }
}
