<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    public function render()
    {
        $category = Category::latest()->paginate(5);

        return view('livewire.category-list', [
            'categories' => $category
        ]);
    }
}
