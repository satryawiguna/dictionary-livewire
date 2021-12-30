<div>
    <div class="flex flex-row">
        <div class="basis-1/2 mr-10">
            <table class="w-full overflow-hidden border rounded-lg border-secondary-300">
                <thead>
                <tr>
                    <x-table.header-cell class="border-r w-5">No</x-table.header-cell>
                    <x-table.header-cell class="border-r w-full">Name</x-table.header-cell>
                    <x-table.header-cell class="whitespace-nowrap">Action</x-table.header-cell>
                </tr>
                </thead>
                <tbody>
                @if($categories->count() > 0)
                    @foreach($categories as $category)
                        <tr>
                            @if(($categories->count() * ($categories->currentPage() - 1) + $loop->iteration) % 2 == 0)
                                <x-table.body-cell class="bg-gray-100">{{ $categories->count() * ($categories->currentPage() - 1) + $loop->iteration }}</x-table.body-cell>
                                <x-table.body-cell class="bg-gray-100">{{ $category->name }}</x-table.body-cell>
                                <x-table.body-cell class="bg-gray-100"></x-table.body-cell>
                            @else
                                <x-table.body-cell>{{ $categories->count() * ($categories->currentPage() - 1) + $loop->iteration }}</x-table.body-cell>
                                <x-table.body-cell>{{ $category->name }}</x-table.body-cell>
                                <x-table.body-cell></x-table.body-cell>
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
        </div>
        <div class="basis-1/2">
            <form>

            </form>
        </div>
    </div>

</div>
