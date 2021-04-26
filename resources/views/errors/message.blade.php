@extends('layouts.public')
@section('title','Fehler')
@section('header','Fehler')

@section('content')
    <div>
        <p class="text-danger font-weight-bold">
            @if( isset($message) )
                {{ $message }}
            @endif
        </p>
    </div>
@endsection
