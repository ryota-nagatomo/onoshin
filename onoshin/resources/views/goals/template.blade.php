@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="text-left">
                    <h1>Smart Goals Template</h1>
                    <h3>Copy your Smart Goals below & paste it on your Daily Report</h3>
                        <div class="goals_template">
                            <p>1. Goal: {{$content}}<br/>
                            ・Accomplishment: {{$rate}}%<br/>
                            ・Review: <br/>
                            ・Next Steps: <br/>
                            <br/>
                            <?php if(isset($content2) && isset($rate2)){ ?>
                            2.Goal: {{$content2}}<br/>
                            ・Accomplishment: {{$rate2}}%<br/>
                            ・Review: <br/>
                            ・Next Steps: <br/>
                            <br/>
                            <?php } ?>
                            <?php if(isset($content3) && isset($rate3)){ ?>
                            3.Goal: {{$content3}}<br/>
                            ・Accomplishment: {{$rate3}}%<br/>
                            ・Review: <br/>
                            ・Next Steps: <br/>
                            </p>
                            <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')