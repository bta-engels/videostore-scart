@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card col-md-12">
                    <div class="card-header row">@lang('shopping cart')</div>
                    <div class="card-body row p-0 justify-content-center">
                        @if($data->count() > 0 )
                            <table class="table table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Movie</th>
                                    <th>Preis</th>
                                    <th>Anzahl</th>
                                    <th>Preis Total</th>
                                    <th colspan="3">&nbsp;</th>
                                </tr>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->movie->id }}</td>
                                    <td>{{ $item->movie->title }}</td>
                                    <td>{{ $item->movie->price }} </td>
                                    <td>{{ $item->quantity }} </td>
                                    <td>{{ $item->sumPrice }} €</td>
                                    <td><form class="d-inline m-0 p-0" action="{{ route( 'scard.increment', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-link m-0 p-0 small" role="link"><i class="fas fa-plus"></i></button>
                                        </form></td>
                                    <td><form class="d-inline m-0 p-0" action="{{ route( 'scard.decrement', ['id' => $item->id]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-link m-0 p-0 small" role="link"><i class="fas fa-minus"></i></button>
                                        </form></td>
                                    <td>@include('components.form.delete', ['entity' => 'scard', 'id' => $item->id])</td>
                                </tr>
                            @endforeach
                                <tr><td class="text-center align-middle text-primary font-weight-bold p-0" colspan="8">
                                        <h4 class="mt-3">Preise Total: {{ $priceTotal }} €</h4></td></tr>
                            </table>
                        @else
                           <h3>Keine Daten vorhanden!</h3>
                        @endif
                    </div>

                    @if($data->count())
                    <div class="card-header row">@lang('Order now')</div>
                    <div class="card-body row p-0 mt-3 justify-content-center">
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
                                        {{ __('Order now') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
