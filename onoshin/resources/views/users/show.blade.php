@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->name, 500) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">TimeLine <span class="badge">{{ $count_goals }}</span></a></li>
            </ul>
            @if (Auth::id() == $user->id)
                  {!! Form::open(['route' => 'goals.store']) !!}
                      <div class="form-group">
                          {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}

                          
                          <!--{!! Form::('rate', old('rate'), ['class' => 'form-control', 'rows' => '2']) !!}-->
                          <!--{!! Form::('content', old('category'), ['class' => 'form-control', 'rows' => '2']) !!}-->
                          


                          {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  {!! Form::close() !!}
            @endif
            @if (count($goals) > 0)
                @include('goals.goals', ['goals' => $goals])
            @endif
        </div>
    </div>
@endsection