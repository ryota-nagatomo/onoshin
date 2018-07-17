@extends('layouts.app')

@section('content')
    <div class='page_title'>
        <h1>Review Smart Goals</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="text-center">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h2 class="panel-title">Previous Goals</h2>
                        </div>
                        <div class="panel-body">
                            {!! Form::open(['route' => 'goals.reviewed']) !!}
                                <?php foreach($goals as $goal): ?>
                                    <p class="text-left" style="font-size:large">{{ $goal->content }}</p>
                                    <div class="form-group row">
                                        <span class="col-xs-2">{!! Form::label('rate[]', 'Acheivement Rate (%):') !!}</span>
                                        <span class="col-xs-10">{!! Form::text('rate[]', old('rate[]'), ['class' => 'form-control','placeholder' => '半角数字を入力']) !!}</span>
                                    </div>
                                    <div class="form-group row">
                                        <span class="col-xs-2">{!! Form::label('review[]', 'Review:') !!}</span>
                                        <span class="col-xs-10">{!! Form::text('review[]', old('review[]'), ['class' => 'form-control','placeholder' => 'Reviewを入力']) !!}</span>
                                    </div>
                                    <div class="form-group row">
                                        <span class="col-xs-2">{!! Form::label('step[]', 'Next Steps:') !!}</span>
                                        <span class="col-xs-10">{!! Form::text('step[]', old('step[]'), ['class' => 'form-control','placeholder' => 'Next stepsを入力']) !!}</span>
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