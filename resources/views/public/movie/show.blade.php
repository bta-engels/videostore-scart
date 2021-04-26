@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row card-header w-100">
                    <h3>{{ $data->title }}</h3>
                    <form class="position-absolute d-block" style="right:3.0rem"
                              action="{{ route('scard.update', ['id' => $data->id]) }}"
                              method="post"
                        >
                        @csrf
                        <button class="btn btn-primary d-inline-block" type="submit">
                            <i class="d-inline-block float-right fas fa-shopping-cart"></i>
                            @lang('Add to shopping cart') @if($added && $added > 0)({{ $added }})@endif</button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row"><span>Author: {{ $data->author }}</span></div>
                    <div class="row"><span>Preis: {{ $data->price }} €</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
