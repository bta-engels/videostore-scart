@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-md-12">
                <div class="card-header row">
                    <h3>{{ __('Order from') }} {{ $data->created_at->format('d.m.Y H:i') }} {{ __('by') }} {{ $data->customer->email }}</h3>
                </div>
                <div class="card-body row mt-3 p-0 justify-content-center">

                    <form class="col-12" method="POST" action="{{ route('admin-order.store', ['id' => $data->id] ) }}">
                        @csrf
                        @include('components.form.fields.checkbox', ['data' => $data, 'name' => 'done'])
                        @include('components.form.fields.submit', ['label' => 'Submit'])
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
