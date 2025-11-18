@php
    // Extract the requested method from the attribute bag. Keep it uppercase for @method.
    $passedMethod = strtoupper($attributes->get('method', 'GET'));
    // HTML form only supports GET and POST. Use POST for other verbs and spoof the real one.
    $formMethod = $passedMethod === 'GET' ? 'GET' : 'POST';
@endphp

<form {{ $attributes->except('method')->merge(['class' => 'max-w-2xl mx-auto space-y-6']) }} method="{{ $formMethod }}">
    @if ($passedMethod !== 'GET')
        @csrf
        @method($passedMethod)
    @endif

    {{ $slot }}
</form>
