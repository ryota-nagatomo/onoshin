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
                    <div class="hidden_box">
                        <label for="label1" class="hidden_box_label">二個目の目標の登録</label>
                        <input type="checkbox" id="label1" class="hidden_box_input" />

                    <div class="hidden_show">
                        <!--非表示ここから-->     
                            <div class="form-group">
                                {!! Form::label('content2', '目標:') !!}
                                {!! Form::text('content2', old('content2'), ['class' => 'form-control','placeholder' => 'Smart Goalを入力']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('rate2', '達成率:') !!}
                                {!! Form::text('rate2', old('rate2'), ['class' => 'form-control','placeholder' => '半角数字を入力']) !!}%
                            </div>
                            <div class="form-group">
                                {!! Form::label('category2', 'カテゴリー:') !!}
                                {!! Form::select('category2', [
                                    '' => 'カテゴリを選択',
                                    '0' => '英語',
                                    '1' => '自己啓発',
                                    '2' => '人間関係',
                                    '3' => '健康管理',
                                    '4' =>'その他'], null, ['class' => 'form-control'])!!}
                            </div>
                            <!--ここまで-->
                        </div>
                        <div class="hidden_box">
                            <label for="label2" class="hidden_box_label">三個目の目標の登録</label>
                            <input type="checkbox" id="label2" class="hidden_box_input" />

                            <div class="hidden_show">
                                <!--非表示ここから-->     
                                <div class="form-group">
                                    {!! Form::label('content3', '目標:') !!}
                                    {!! Form::text('content3', old('content3'), ['class' => 'form-control','placeholder' => 'Smart Goalを入力']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('rate3', '達成率:') !!}
                                    {!! Form::text('rate3', old('rate3'), ['class' => 'form-control','placeholder' => '半角数字を入力']) !!}%
                                </div>
                                <div class="form-group">
                                    {!! Form::label('category3', 'カテゴリー:') !!}
                                    {!! Form::select('category3', [
                                        '' => 'カテゴリを選択',
                                        '0' => '英語',
                                        '1' => '自己啓発',
                                        '2' => '人間関係',
                                        '3' => '健康管理',
                                        '4' =>'その他'], null, ['class' => 'form-control'])!!}
                                </div>
                                <!--ここまで-->
                            </div>
                        </div>
                    </div>
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
