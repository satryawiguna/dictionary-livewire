@props(['success'])

<div {{ $attributes->merge(['class' => 'bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative']) }}>
    <strong class="font-bold">Success</strong>
    <span class="block sm:inline">{{ $success }}</span>
</div>
