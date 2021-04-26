@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row card-header w-100">
                    <h3>{{ $author->firstname }} {{ $author->lastname }}</h3>
                </div>
                <div class="card-body">

                        @if($movies->count() > 0 )
                            @if( method_exists($movies, 'links') )
                                <div class="float-left col-6">
                                    {{ $movies->links() }}
                                </div>
                            @endif

                            <table class="table">
                                <tr>
                                    <th>@lang('Movies')</th>
                                </tr>
                                @foreach ($movies as $item)
                                    <tr>
                                        <td class="d-none d-md-table-cell">{{ $item->title }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            @if( method_exists($author, 'links') )
                                <div class="float-left col-6">
                                    {{ $author->links() }}
                                </div>
                            @endif
                        @else
                            <h3>Keine Daten vorhanden!</h3>
                        @endif

                </div>
            </div>
        </div>
    </div>
@endsection
