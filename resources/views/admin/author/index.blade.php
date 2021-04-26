@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card col-md-12">
                    <div class="card-header row">
                        <div class="col">
                            {{ __('Authors') }}
                        </div>
                        <div class="col float-right text-right">
                            <a class="btn btn-primary" role="button" href="{{ route('admin-author.edit')  }}">Create New</a>
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
                                    <th colspan="3">&nbsp&nbsp;</th>
                                </tr>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="d-none d-md-table-cell">@if($item->lastname) {{ $item->lastname }} @endif</td>
                                    <td class="d-none d-md-table-cell">@if($item->firstname) {{ $item->firstname }} @endif</td>

                                    <td><a class="btn-sm btn-primary" href="{{ route('admin-author.show', ['id' => $item->id]) }}">Show</a></td>
                                    <td><a class="btn-sm btn-primary" href="{{ route('admin-author.edit', ['id' => $item->id]) }}">Edit</a></td>
                                    <td><a class="btn-sm btn-primary softdel" href="{{ route('admin-author.delete', ['id' => $item->id]) }}">
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
