@if (Auth::user()->is_good($goal->id))
        {!! Form::open(['route' => ['user.ungood', $goal->id], 'method' => 'delete']) !!}
            <button type="submit" class="btn btn-original"><span class='glyphicon glyphicon-ok color-blue'></span></button>
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.good', $goal->id]]) !!}
            <button type="submit" class="btn btn-original"><span class='glyphicon glyphicon-ok'></span></button>
        {!! Form::close() !!}
@endif