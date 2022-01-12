<div>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-row">
                        @if($isUpdate)
                            <livewire:dictionary.dictionary-update></livewire:dictionary.dictionary-update>
                        @else
                            <livewire:dictionary.dictionary-create></livewire:dictionary.dictionary-create>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between mt-4">
                        <select wire:model="pageSize" class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>

                        <div class="flex flex-row gap-5">
                            <select wire:model="searchType" class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                                <option value="">Select Option</option>
                                <option value="word">Word</option>
                                <option value="phrase">Phrase</option>
                            </select>

                            <div wire:ignore>
                                <select wire:model="searchCategory" id="search-category" class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-150 p-4">
                                    <option value="">Select Option</option>
                                    @foreach($categories as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <input wire:model="search" class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="search" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($dictionaries->total() > 0)
        @foreach($dictionaries as $dictionary)
            <div class="pb-10">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="flex flex-col gap-5">
                                <div class="flex flex-row gap-10">
                                    <div>
                                        <x-label for="type" :value="__('Type')" />
                                        {{ ucwords($dictionary->type) }}
                                    </div>

                                    <div>
                                        <x-label for="category" :value="__('Category')" />
                                        {{ $dictionary->category->name }}
                                    </div>

                                    <div class="flex flex-row gap-10 w-full">
                                        <div class="flex flex-row items-center gap-5 basis-1/2">
                                            <div class="aspect-square w-10">
                                                <img src="{{ asset('assets/indonesia.png') }}" class="object-cover" />
                                            </div>
                                            <p>
                                                {{ $dictionary->vocab_id }}
                                            </p>
                                        </div>
                                        <div class="flex flex-row items-center gap-5 basis-1/2">
                                            <div class="aspect-square w-10">
                                                <img src="{{ asset('assets/united-kingdom.png') }}" class="object-cover" />
                                            </div>
                                            <p>
                                                {{ $dictionary->vocab_en }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <div class="flex flex-row gap-2">
                                    <button type="button" wire:click="handleEdit({{ $dictionary->id }})" class="bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold py-2 px-4 rounded">Edit</button>
                                    <button type="button" wire:click="handleDelete({{ $dictionary->id }})" class="bg-red-500 hover:bg-red-700 text-sm text-white font-bold py-2 px-4 rounded">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="pb-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        No data available
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('styles')
    <style>
        .select2-container--default .select2-selection--single {
            height: auto;
            padding: 5px 0px;
            @apply block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
            right: 10px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#search-category').select2();
            $('#search-category').on('change', function (e) {
                var data = $('#search-category').select2("val");
                @this.set('searchCategory', data);
            });
        });
    </script>
@endpush
