<div>
    <div class="flex flex-row">
        <form wire:submit.prevent="handleStore" class="w-full">
            <div class="w-full">
                <x-label for="type" :value="__('Type')" />

                <select wire:model="type" class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                    <option value="word" selected>Word</option>
                    <option value="phrase">Phrase</option>
                </select>
            </div>
            <div class="w-full mt-4">
                <x-label for="category" :value="__('Category')" />

                <input wire:model="category" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="category" placeholder="Search Category..." />
            </div>
            <div class="flex flex-row mt-4">
                <div class="basis-1/2 pr-4">
                    <textarea class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5"></textarea>
                </div>
                <div class="basis-1/2 pl-4">
                    <textarea class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="5"></textarea>
                </div>
            </div>

        </form>

    </div>
</div>
