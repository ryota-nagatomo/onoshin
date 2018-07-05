@extends('layouts.app')

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                <div>
                    {!! Form::open(['route' => 'goals.search']) !!}
                        <div class="form-group">
                            {!! Form::label('keyword', 'キーワード:') !!}
                            {!! Form::text('keyword', old('keyword'), ['class' => 'form-control','placeholder' => 'キーワードを入力']) !!}
                            {!! Form::submit('目標を検索', ['class' => 'btn btn-success btn-lg']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                <div>
                    {{ $data->appends(Request::only('keyword'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection