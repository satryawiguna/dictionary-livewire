@props(['colspan'])

<td class="p-2" {{ ($colspan) ? 'colspan=' . $colspan : '' }}>{{ $slot }}</td>
