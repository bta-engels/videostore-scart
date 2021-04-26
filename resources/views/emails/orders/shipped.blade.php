@component('mail::message')
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

# Videostore Bestellung
Hallo {{ $order->customer->name }} <a href="mailto:{{ $order->customer->email }}">{{ $order->customer->email }}</a>

# Folgende Filme wurden bestellt
@component('mail::table')
| ID | Artikel | Stückzahl | Einzelpreis | Total |
| :--: | :------- | :---------: | :-----------: | :-----: |
@foreach($order->orderItems as $item)
| {{$item->movie->id}} | {{$item->movie->title}} | {{$item->quantity}} | {{$item->movie->price}} € | {{$item->price}} € |
@endforeach
@endcomponent

### Summe Total: {{ $order->price_total }} €

@slot('footer')
@component('mail::footer')
Danke für Ihre Bestellung
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot

@endcomponent
