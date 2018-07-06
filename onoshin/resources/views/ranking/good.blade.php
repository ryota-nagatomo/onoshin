@extends('layouts.app')

@section('content')
    <h1>Goodランキング</h1>
    @include('ranking.index', ['goals' => $goals])
@endsection