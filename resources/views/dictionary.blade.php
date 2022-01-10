<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dictionary') }}
        </h2>
    </x-slot>

    <livewire:dictionary.dictionary-list></livewire:dictionary.dictionary-list>

</x-app-layout>
