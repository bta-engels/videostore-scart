@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card col-md-12">
                    <div class="card-header row">
                        <div class="col">
                            {{ __('Orders') }}
                        </div>
                    </div>
                    <div class="card-body row p-0 justify-content-center">
                        @if($data->count() > 0 )
                            @if( method_exists($data, 'links') )
                            <div class="float-left col-6">
                                {{ $data->links() }}
                            </div>
                            @endif

                            <table class="table table-striped">
                                <tr>
                                    <th class="d-none d-md-table-cell">{{ __('Customer') }}</th>
                                    <th class="d-none d-md-table-cell">{{ __('price total') }}</th>
                                    <th class="d-none d-md-table-cell">{{ __('done')  }}</th>
                                    <th class="d-none d-md-table-cell">{{ __('done at')  }}</th>
                                    <th class="d-none d-md-table-cell">{{ __('created at') }}</th>
                                    <th colspan="3">&nbsp&nbsp;</th>
                                </tr>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->customer->email }}</td>
                                    <td class="d-none d-md-table-cell">{{ $item->price_total }} €</td>
                                    <td class="d-none d-md-table-cell">@if($item->done)<i class="fas fa-hand-holding-usd"></i>@else<i class="fas fa-times text-danger">@endif</td>
                                    <td class="d-none d-md-table-cell">@if($item->done_at){{ $item->done_at->format('d.m.Y') }}@else<i class="fas fa-times text-danger">@endif</td>
                                    <td class="d-none d-md-table-cell">{{ $item->created_at->format('d.m.Y H:i') }}</td>

                                    <td><a class="btn-sm btn-primary" href="{{ route('admin-order.show', ['id' => $item->id]) }}">Show</a></td>
                                    <td><a class="btn-sm btn-primary" href="{{ route('admin-order.edit', ['id' => $item->id]) }}">Edit</a></td>
                                    <td><a class="btn-sm btn-primary softdel" href="{{ route('admin-order.delete', ['id' => $item->id]) }}">
                                            <i class="fas fa-trash d-inline d-md-none"></i>
                                            <span class="d-none d-md-inline">Delete</span></a></td>
                                </tr>
                            @endforeach
                            </table>
                            @if( method_exists($data, 'links') )
                            <div class="float-left col-6">
                                {{ $data->links() }}
                            </div>
                            @endif
                        @else
                           <h3>Keine Daten vorhanden!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
