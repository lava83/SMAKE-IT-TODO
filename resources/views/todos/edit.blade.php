@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Todo bearbeiten') }}</div>

                    <div class="card-body">
                        @include('todos._partial.form', ['route' => route('todos.update', ['todo' => $todo]), 'method' => 'patch'])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
