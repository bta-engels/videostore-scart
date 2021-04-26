@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row card-header w-100">
                    <h3>{{ $data->title }}</h3>
                </div>
                <div class="card-body">
                    <div class="row"><span>Author: {{ $data->author }}</span></div>
                    <div class="row"><span>Preis: {{ $data->price }} €</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
