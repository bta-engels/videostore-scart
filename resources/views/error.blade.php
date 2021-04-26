@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Error') }}</div>
                    <div class="card-body alert-danger">
                        <p>
                            {{ $error }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
