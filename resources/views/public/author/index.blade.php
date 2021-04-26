@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card col-md-12">
                    <div class="card-header row">
                        <div class="col">
                            {{ __('Authors') }}
                        </div>
                    </div>
                    <div class="card-body row p-0 justify-content-center">
                        @if($data->count() > 0 )
                            @if( method_exists($data, 'links') )
                            <div class="float-left col-6">
                                {{ $data->links() }}
                            </div>
                            @endif

                            <table class="table">
                                <tr>
                                    <th>@lang('Last Name')</th>
                                    <th>@lang('First Name')</th>
                                    <th>&nbsp&nbsp;</th>
                                </tr>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="d-none d-md-table-cell">@if($item->lastname) {{ $item->lastname }} @endif</td>
                                    <td class="d-none d-md-table-cell">@if($item->firstname) {{ $item->firstname }} @endif</td>

                                    <td><a class="btn-sm btn-primary" href="{{ route('author.show', ['id' => $item->id]) }}">Show</a></td>
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
