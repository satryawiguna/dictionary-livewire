<div>
    <x-form-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="handleStore">
        <div>
            <x-label for="name" :value="__('Name')" />

            <input wire:model="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" autofocus />
        </div>

        <div class="flex items-center justify-start mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                Submit Category
            </button>
        </div>
    </form>
</div>
