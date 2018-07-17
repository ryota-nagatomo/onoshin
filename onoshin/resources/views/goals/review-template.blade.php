@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="text-center">
                    <h1 class='page_title'>Smart Goals Template</h1>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">Your Smart Goals</h2>
                            </div>
                            <div class="panel-body">
                                <div class="goals_template">
                                    <?php foreach($goals as $key => $goal){ ?>
                                    <p class="text-left">{{ $key+1 }}. Goal: {{$goal->content}}<br/>
                                    ・Accomplishment: {{$goal->rate}}%<br/>
                                    ・Review: {{$reviews[$key]}} <br/>
                                    ・Next Steps: {{$steps[$key]}} <br/>
                                    <br/>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                </div>
                <div class=text-center>
                    <div class="buttons">
                          <a class="button button-showw" href="{{ route('goals.create') }}">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                          Add Goals
                          </a>
                   
                         <a class="button button-showww" href= "{{ route('goals.search')}}" >
                         <span class = "glyphicon glyphicon-search" area-hidden="true"></span>
                         Search for Goals
                         </a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection('content')