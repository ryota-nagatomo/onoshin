@extends('layouts.app')

@section('content')
    <div class='page_title'>
        <h1>Search for Goals</h1>
    </div>

    <div class="search">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="text-center">
                    {!! Form::open(['route' => 'goals.search', 'method' => 'get']) !!}
                        <div class="form-group row">
                             <span class="col-xs-2">{!! Form::label('keyword', 'Keyword:') !!}</span>
                             <span class="col-xs-10">{!! Form::text('keyword', old('keyword'), ['class' => 'form-control','placeholder' => 'キーワードを入力']) !!}</span>
                        </div>
                        <div class="form-group row">
                            <span class="col-xs-2">{!! Form::label('rate', 'Acheivement Rate (%):') !!}</span>
                            <span class="col-xs-8">{!! Form::text('rate', old('rate'), ['class' => 'form-control','placeholder' => '半角数字を入力']) !!}</span>
                            <span class="col-xs-2">{!! Form::select('relate', [
                                '0' => 'equal',
                                '1' => 'above',
                                '2' => 'below'], null, ['class' => 'form-control'])!!}
                                </span>
                        </div>
                        <div class="form-group row">
                             <span class="col-xs-2">{!! Form::label('category', 'Category:') !!}</span>
                            <span class="col-xs-10">{!! Form::select('category', [
                                '' => 'カテゴリを選択',
                                '0' => 'Study',
                                '1' => 'Private',
                                '2' => 'Communication',
                                '3' => 'Health',
                                '4' =>'Work'], null, ['class' => 'form-control'])!!}      </span>
                        </div>
                        <div class="form-group row">
                            <span class="col-xs-2">{!! Form::label('day', 'Date:') !!}</span>
                            <span class="col-xs-8">{!! Form::date('day', old('day'), ['class' => 'form-control']) !!}</span>
                            <span class="col-xs-2">{!! Form::select('relate2', [
                                '0' => 'equal',
                                '1' => 'after',
                                '2' => 'before'], null, ['class' => 'form-control'])!!}
                                </span>
                        </div>
                        {!! Form::submit('Search!', ['class' => 'btn btn-success btn-lg']) !!}
                        {!! Form::close() !!}
                        <br>
                        <div class="panel panel-primary" style="word-break:break-all;">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="font-family:'ＭＳ　ゴシック', sans-serif">Results</h3>
                            </div>
                        @include('goals.search-index', ['goals' => $goals])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection