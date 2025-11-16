@props([
    'url' => '#',
    'text' => 'Make a booking',
])

<a href="{{ $url }}" {{ $attributes->merge([
        'class' => 'bg-bce-accent hover:bg-orange-700 text-white font-bold py-3 px-6 rounded-md text-center transition duration-300'
    ]) }}>
    {{ $text }}
</a>
