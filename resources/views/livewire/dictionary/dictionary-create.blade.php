<div class="w-full">
    <x-form-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="handleStore" class="w-full">
        <div class="w-full">
            <x-label for="type" :value="__('Type')" />

            <select wire:model="type" class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                <option value="word">Word</option>
                <option value="phrase">Phrase</option>
            </select>
        </div>
        <div class="w-full mt-4">
            <x-label for="category" :value="__('Category')" />

            <div wire:ignore>
                <select wire:model="category" id="category" class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full p-4">
                    <option value="">Select Option</option>
                    @foreach($categories as $value)
                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex flex-row mt-4">
            <div class="basis-1/2 pr-4">
                <x-label for="ind" :value="__('Bahasa (IND)')" />

                <textarea wire:model="vocab_id" name="vocab_id" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5"></textarea>
            </div>
            <div class="basis-1/2 pl-4">
                <x-label for="en" :value="__('English (EN)')" />

                <textarea wire:model="vocab_en" name="vocab_en" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5"></textarea>
            </div>
        </div>
        <div class="flex items-center justify-start mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Submit Dictionary
            </button>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#category').select2();
            $('#category').on('change', function (e) {
                var data = $('#category').select2("val");
            @this.set('category', data);
            });
        });
    </script>
@endpush
