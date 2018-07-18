@extends('layouts.app')

@section('content')
    <div class='page_title'>
        <h1>Smart Goals List</h1>
    </div>
    <div class="panel panel-primary" style="word-break:break-all;">
        <div class="panel-heading">
            <h3 class="panel-title">Keeps</h3>
        </div>
        @include('ranking.index', ['goals' => $goals])
    </div>
@endsection