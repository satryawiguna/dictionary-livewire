<div>
    <div class="flex flex-row">
        <div class="basis-1/2 mr-10">

            <div class="flex justify-between mt-4">
                <select wire:model="pageSize" class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>

                <input wire:model="search" class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="search" />
            </div>

            <br />

            <table class="w-full overflow-hidden border rounded-lg border-secondary-300">
                <thead>
                <tr>
                    <x-table.header-cell class="border-r w-5">No</x-table.header-cell>
                    <x-table.header-cell class="border-r w-2/3">Name</x-table.header-cell>
                    <x-table.header-cell class="w-1/3">Action</x-table.header-cell>
                </tr>
                </thead>
                <tbody>
                @if($categories->count() > 0)
                    @foreach($categories as $category)
                        <tr>
                            @if(($categories->count() * ($categories->currentPage() - 1) + $loop->iteration) % 2 == 0)
                                <x-table.body-cell class="bg-gray-100">{{ $categories->count() * ($categories->currentPage() - 1) + $loop->iteration }}</x-table.body-cell>
                                <x-table.body-cell class="bg-gray-100">{{ $category->name }}</x-table.body-cell>
                                <x-table.body-cell class="bg-gray-100 whitespace-nowrap">
                                    <button type="button" wire:click="handleEdit({{ $category->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                    <button type="button" wire:click="handleDelete({{ $category->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </x-table.body-cell>
                            @else
                                <x-table.body-cell>{{ $categories->count() * ($categories->currentPage() - 1) + $loop->iteration }}</x-table.body-cell>
                                <x-table.body-cell>{{ $category->name }}</x-table.body-cell>
                                <x-table.body-cell class="whitespace-nowrap">
                                    <button type="button" wire:click="handleEdit({{ $category->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                    <button type="button" wire:click="handleDelete({{ $category->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </x-table.body-cell>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <x-table.body-cell :colspan="3">
                            Data is not available
                        </x-table.body-cell>
                    </tr>
                @endif
                </tbody>
            </table>

            <br />

            {{ $categories->links() }}
        </div>
        <div class="basis-1/2">
            @if(session()->has('success'))
                <x-form-validation-success class="mb-4" :success="session('success')" />
            @endif

            @if($isUpdate)
                <livewire:category.category-update></livewire:category.category-update>
            @else
                <livewire:category.category-create></livewire:category.category-create>
            @endif

        </div>
    </div>

</div>
