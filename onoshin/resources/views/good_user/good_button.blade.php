@if (Auth::user()->is_good($goal->id))
        {!! Form::open(['route' => ['user.ungood', $goal->id], 'method' => 'delete']) !!}
            {!! Form::submit('Ungood', ['class' => "btn btn-danger "]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.good', $goal->id]]) !!}
            {!! Form::submit('Good', ['class' => "btn btn-primary "]) !!}
        {!! Form::close() !!}
    @endif