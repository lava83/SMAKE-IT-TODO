@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

<form action="{{$route}}" method="post">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="title">{{ __('Titel') }}</label>
        <input type="text" class="form-control
        @if($errors->has('title'))
            is-invalid
        @endif
        " id="title"  placeholder="{{ __('Titel') }}..." name="title" value="{{old('title', (isset($todo) ? $todo->title : null))}}">
    </div>
    <div class="form-group">
        <label for="description">{{ __('Beschreibung') }}</label>
        <textarea class="form-control
        @if($errors->has('description'))
            is-invalid
        @endif
        " id="description" name="description" rows="3" placeholder="{{ __('Beschreibung') }}...">{{old('description', (isset($todo) ? $todo->description : null))}}</textarea>
    </div>
    <button type="submit" class="btn btn-success">Speichern</button>
</form>
