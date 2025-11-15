@props(['label', 'name', 'discription'=>false])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border border-black/50 px-5 py-4 w-full',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name :$discription>
    <textarea {{ $attributes($defaults) }}>
    </textarea>
    <p class='text-gray-500 text-sm'>{{$discription}}</p>
</x-forms.field>

