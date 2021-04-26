@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12">
                <div class="card-header row"><h3 class="my-0 py-0">Create New Order</h3></div>
                <div class="card-body row mt-3 p-0 justify-content-center">

                    <!-- scard data by session_id -->
                    @if($scard->count() > 0 )
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Movie</th>
                                <th>Preis</th>
                                <th>Anzahl</th>
                                <th>Preis Total</th>
                            </tr>
                            @foreach ($scard as $item)
                                <tr>
                                    <td>{{ $item->movie->id }}</td>
                                    <td>{{ $item->movie->title }}</td>
                                    <td>{{ $item->movie->price }} </td>
                                    <td>{{ $item->quantity }} </td>
                                    <td>{{ $item->sumPrice }} €</td>
                                </tr>
                            @endforeach
                            <tr><td class="text-center align-middle text-primary font-weight-bold p-0" colspan="8">
                                    <h4 class="mt-3">Preise Total: {{ $priceTotal }} €</h4></td></tr>
                        </table>
                    @else
                        <h3>Der Warenkorb ist leer!</h3>
                    @endif

                    <form class="col-12" method="POST" action="{{ route('order.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label">{{ __('Name') }}</label>
                            <div class="col-md-10">
                                <input class="col-md-12 px-1" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="">
                                @error('name')
                                <span class="d-block invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label">{{ __('Email') }}</label>
                            <div class="col-md-10">
                                <input class="col-md-12 px-1" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="">
                                @error('email')
                                <span class="d-block invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 my-3">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

