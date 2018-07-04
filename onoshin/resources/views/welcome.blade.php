@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>おのしん</h1>
                @if (!Auth::check())
                    <a href="{{ route('signup.get') }}" class="btn btn-success btn-lg">おのしんを始める</a>
                @endif
               
            </div>
        </div>
    </div>
@endsection

@section('content')
    おのしん
@endsection