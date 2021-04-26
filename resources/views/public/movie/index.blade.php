@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card col-md-12">
                    <div class="card-header row">
                        <div class="col">
                            {{ __('Movie') }}
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
                                    <th>Titel</th>
                                    <th class="d-none d-md-table-cell">Kategorie</th>
                                    <th class="d-none d-md-table-cell">Autor</th>
                                    <th class="d-none d-md-table-cell">€</th>
                                    <th class="d-none d-md-table-cell">Jahr</th>
                                    <th>&nbsp&nbsp;</th>
                                </tr>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td class="d-none d-md-table-cell">@if($item->category) {{ $item->category }} @endif</td>
                                    <td class="d-none d-md-table-cell">@if($item->author) {{ $item->author }} @endif</td>
                                    <td class="d-none d-md-table-cell">{{ $item->price }} </td>
                                    <td class="d-none d-md-table-cell">{{ $item->created_at->format('Y') }}</td>

                                    <td><a class="btn-sm btn-primary" href="{{ route('movie.show', ['id' => $item->id]) }}">Show</a></td>
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
