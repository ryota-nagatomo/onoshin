@extends('layouts.app')

@section('content')
    <div class='page_title'>
        <h1>Review Goals</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="text-center">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Previous Goals</h2>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['route' => 'goals.reviewed']) !!}
                                <?php foreach($goals as $goal): ?>
                                    <p style="font-size:large">{{ $goal->content }}</p>
                                    <div class="form-group row">
                                        <span class="col-xs-2">{!! Form::label('rate[]', 'Acheivement Rate (%):') !!}</span>
                                        <span class="col-xs-10">{!! Form::text('rate[]', old('rate[]'), ['class' => 'form-control','placeholder' => '半角数字を入力']) !!}</span>
                                    </div>
                                    <input name="id[]" type="hidden" value= '{{$goal->id}}' >
                                <?php endforeach; ?>
                                {!! Form::submit('Register', ['class' => 'btn btn-primary btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection