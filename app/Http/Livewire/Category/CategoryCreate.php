<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryCreate extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string'
    ];

    public function render()
    {
        return view('livewire.category.category-create');
    }

    public function handleStore()
    {
        $this->validate();

        $category = Category::create([
            'name' => $this->name
        ]);

        $this->handleClearFields();

        $this->emit('storeCategory', $category);
    }

    private function handleClearFields()
    {
        $this->name = null;
    }


}
