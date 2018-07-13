@extends('layouts.app')

@section('content')
    <div class='page_title'>
        <h1>Goals Setting</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="text-center">
                    {!! Form::open(['route' => 'goals.store']) !!}
                        <div class="form-group row">
                            <span class="col-xs-2">{!! Form::label('content', 'Smart Goal:') !!}</span>
                            <span class="col-xs-10">{!! Form::text('content', old('content'), ['class' => 'form-control','placeholder' => 'Smart Goalを入力']) !!}</span>
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
                        
                        <div class="hidden_box">
                            <label for="label1" class="hidden_box_label">二個目の目標の登録</label>
                            <input type="checkbox" id="label1" class="hidden_box_input" />

                        <div class="hidden_show">
                            <!--非表示ここから-->     
                                <div class="form-group row">
                                    <span class="col-xs-2">{!! Form::label('content2', 'Smart Goal:') !!}</span>
                                    <span class="col-xs-10">{!! Form::text('content2', old('content2'), ['class' => 'form-control','placeholder' => 'Smart Goalを入力']) !!}</span>
                                </div>
                                <div class="form-group row">
                                    <span class="col-xs-2">{!! Form::label('category2', 'Category:') !!}</span>
                                    <span class="col-xs-10">{!! Form::select('category2', [
                                        '' => 'カテゴリを選択',
                                        '0' => 'Study',
                                        '1' => 'Private',
                                        '2' => 'Communication',
                                        '3' => 'Health',
                                        '4' =>'Work'], null, ['class' => 'form-control'])!!}</span>
                                </div>
                                <!--ここまで-->
                            </div>
                            
                            <div class="hidden_box">
                                <label for="label2" class="hidden_box_label">三個目の目標の登録</label>
                                <input type="checkbox" id="label2" class="hidden_box_input" />

                                <div class="hidden_show">
                                    <!--非表示ここから-->     
                                    <div class="form-group row">
                                        <span class="col-xs-2">{!! Form::label('content3', 'Smart Goal:') !!}</span>
                                        <span class="col-xs-10">{!! Form::text('content3', old('content3'), ['class' => 'form-control','placeholder' => 'Smart Goalを入力']) !!}</span>
                                    </div>
                                    <div class="form-group row">
                                        <span class="col-xs-2">{!! Form::label('category3', 'Category:') !!}</span>
                                        <span class="col-xs-10">{!! Form::select('category3', [
                                            '' => 'カテゴリを選択',
                                            '0' => 'Study',
                                            '1' => 'Private',
                                            '2' => 'Commmunication',
                                            '3' => 'Health',
                                            '4' =>'Work'], null, ['class' => 'form-control'])!!}</span>
                                    </div>
                                    <!--ここまで-->
                                </div>
                            </div>
                        </div>
                        {!! Form::submit('Register', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
