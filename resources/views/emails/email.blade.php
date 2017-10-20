@component('mail::message')
# Newbles

@component('mail::panel')
{{ $mensaje }}
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8000', 'color' => 'green'])
    Ver
@endcomponent

Gracias
@endcomponent
