@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Todos Übersicht') }}</div>

                    <div class="card-body">
                        <a class="btn btn-success mb-3" href="{{route('todos.create')}}">Todo Anlegen</a>
                        <form action="{{route('todos.filter')}}" method="get" class="form-inline mb-5">
                            <label for="filter_status">Status</label>
                            <select class="form-control ml-3" id="filter_status" name="filter[status]">
                                <option value="open"
                                        @if(isset($filter) and $filter['status'] == 'open')
                                        selected="selected"
                                    @endif
                                >{{__('offen')}}</option>
                                <option value="closed"
                                        @if(isset($filter) and $filter['status'] == 'closed')
                                        selected="selected"
                                    @endif
                                >{{__('geschlossen')}}</option>
                            </select>

                            <button type="submit" class="btn btn-info ml-3">Filtern</button>


                        </form>


                        @if($todos->count() > 0)
                            <table class="table table-bordered table-striped table-hover">
                                @foreach($todos as $todo)
                                    <tr>
                                        <td>
                                            {{$todo->title}}<br>
                                            <small>{{$todo->description}}</small>
                                        </td>
                                        <td>
                                            {{$todo->status}}
                                        </td>
                                        <td>
                                            @if($todo->status == 'open')

                                            <form action="{{route('todos.checked', ['todo' => $todo->getKey()])}}"
                                                  method="post" class="mb-1">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">{{__('Erledigt')}}</button>
                                            </form>
                                            @endif
                                            <a href="{{route('todos.edit', ['todo' => $todo])}}"
                                               class="btn btn-info btn-sm mb-1">{{__('Bearbeiten')}}</a>
                                            <form action="{{route('todos.destroy', ['todo' => $todo->getKey()])}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{__('Wollen Sie den Eintrag wirklich löschen?')}}')">{{__('Löschen')}}</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>Noch keine Todos vorhanden. <a href="{{route('todos.create')}}">Anlegen</a></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
