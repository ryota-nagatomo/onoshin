@extends('layouts.app')

@section('content')
<div class='page_title'>
     <h1 style="font-size:50pt">Smart Goals</h1>
     <h2>Login</h2>
</div>     
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-success">
            <div class="panel-heading"style="font-size:large">Please fill in the following necessary infomations.</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! form::label('name', 'User Name') !!}
                        {!! form::text('name', old('name'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::label('password', 'Password') !!}
                        {!! form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="text-right">
                        {!! form::submit('Login', ['class' => 'btn btn-success']) !!}
                    </div>
                {!! form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection