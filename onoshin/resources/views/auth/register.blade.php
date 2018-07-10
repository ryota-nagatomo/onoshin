@extends('layouts.app')

@section('content')
<div style='font-family:"Constantia","ＭＳ 明朝",serif; font-weight:bolder; text-align:center'>
    <h1 style="font-size:50pt">Smart Goals</h1>
    
    <h2>Membership Registration</h2>
    
</div>

<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">Please fill in the following necessary infomations</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'signup.post']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'User Name') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Password（confirmation）') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>

                    <div class="text-center">
                        {!! Form::submit('Register!', ['class' => 'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection