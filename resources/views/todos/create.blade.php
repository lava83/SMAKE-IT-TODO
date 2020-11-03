@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Todo anlegen') }}</div>

                    <div class="card-body">
                        @include('todos._partial.form', ['route' => route('todos.store'), 'method' => 'post'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
