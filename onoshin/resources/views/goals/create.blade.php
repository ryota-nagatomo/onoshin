@extends('layouts.app')

@section('content')
    <div class="search">
        <div class="row">
            <div class="text-center">
                {!! Form::open(['route' => 'goals.store']) !!}
                    <div class="form-group">
                        {!! Form::label('content', '目標:') !!}
                        {!! Form::text('content', old('content'), ['class' => 'form-control','placeholder' => 'Smart Goalを入力']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('rate', '達成率:') !!}
                        {!! Form::text('rate', old('rate'), ['class' => 'form-control','placeholder' => '半角数字を入力']) !!}%
                            <!--'' => '%',-->
                            <!--'0' => '0',-->
                            <!--'1' => '10',-->
                            <!--'2' => '20',-->
                            <!--'3' => '30',-->
                            <!--'4' => '40',-->
                            <!--'5' => '50',-->
                            <!--'6' => '60',-->
                            <!--'7' => '70',-->
                            <!--'8' => '80',-->
                            <!--'9' => '90',-->
                            <!--'10' => '100',-->
                            <!--'11' => '>100',], null, ['class' => 'form-control'])!!}-->
                    </div>
                    <div class="form-group">
                        {!! Form::label('category', 'カテゴリー:') !!}
                        {!! Form::select('category', [
                            '' => 'カテゴリを選択',
                            '0' => '英語',
                            '1' => '自己啓発',
                            '2' => '人間関係',
                            '3' => '健康管理',
                            '4' =>'その他'], null, ['class' => 'form-control'])!!}      
                        <!--カテゴリはまた考える-->
                    </div>
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
