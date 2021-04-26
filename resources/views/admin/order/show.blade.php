@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row card-header w-100">
                    <h3>{{ __('Order from') }} {{ $data->created_at->format('d.m.Y H:i') }} {{ __('by') }} {{ $data->customer->email }}</h3>
                </div>
                <div class="card-body row p-0 justify-content-center">
                    <h5 class="my-2">{{ __('Price total') }} {{ $priceTotal }} €</h5>
                    <table class="table table-striped">
                        <tr>
                            <th class="d-none d-md-table-cell">{{ __('Movie ID') }}</th>
                            <th class="d-none d-md-table-cell">{{ __('Movie') }}</th>
                            <th class="d-none d-md-table-cell">{{ __('Quantity')  }}</th>
                            <th class="d-none d-md-table-cell">{{ __('price total') }}</th>
                        </tr>
                        @foreach ($data->orderItems as $item)
                            @if($item->movie)
                            <tr>
                                <td>{{ $item->movie->id }}</td>
                                <td>{{ $item->movie->title }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->quantity }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->price }} €</td>
                            </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
