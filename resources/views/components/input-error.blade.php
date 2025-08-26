@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-white p-1 dark:bg-red-600 rounded-lg space-y-1']) }}>
        @foreach ((array) $messages as $message) 
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
