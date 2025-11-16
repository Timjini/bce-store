@props([
    'url' => '#',
    'text' => 'Make a booking',
])

<a href="{{ $url }}" {{ $attributes->merge([
        'class' => 'bg-transparent hover:bg-white hover:text-bce-blue text-white font-bold py-3 px-6 border-2 border-white rounded-md text-center transition duration-300'
    ]) }}>
    {{ $text }}
</a>
