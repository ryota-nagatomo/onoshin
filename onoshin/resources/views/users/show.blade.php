@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <!--後でコンテンツを追加-->
                <!--<div class="panel-body">-->
                <!--    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->name, 500) }}" alt="">-->
                <!--</div>-->
            </div>
        </aside>
        <div class="col-xs-8">
            @if (count($health)+count($people)+count($own)+count($english)+count($other) != 0)
                @include('goals.goals')
            @endif
        </div>
    </div>
@endsection