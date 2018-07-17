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
                                        <p class="text-left">SMART Goal 1: {{$content}}<br/>
                                            	Why→ {{$why}}
                                        <br/>
                                        <?php if(isset($content2)){ ?>
                                        SMART Goal 2: {{$content2}}<br/>
                                            	Why→ {{$why2}}
                                        <br/>
                                        <?php } ?>
                                        <?php if(isset($content3)){ ?>
                                        SMART Goal 3: {{$content3}}<br/>
                                            	Why→ {{$why3}}
                                        </p>
                                        <?php } ?>
                                    </div>
                                </div>
                        </div>
                    <h4><?php 
                        /*現在の日付の曜日の番号を出力する*/
                        $date = date('w');
                        if ($date == 1) {
                            echo "Good work $usesr->name! It was a great start of this week!";
                        }
                        elseif ($date == 2){
                            echo "Well done $user->name! Get rest and be ready for tomorrow :-)";
                        }
                        elseif ($date == 3){
                            echo "Good work $user->name! 2 more days to go!!";
                        }
                        elseif ($date == 4){
                            echo "Good job $user->name! Tomorrow is the last day of this week!";
                        }
                        elseif ($date == 5){
                            echo "TGIF!! Have a great weekend :-)";
                        }
                        else{
                            echo "休めよ";
                        }
                        ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endsection('content')