@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="text-left">
                    <h1 class='page_title'>Smart Goals Template</h1>
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
                    <h4><?php 
                        /*現在の日付の曜日の番号を出力する*/
                        $date = date('w');
                        if ($date == 1) {
                            echo "Good work $usesr->name! It was a great start of this week!";
                        }
                        elseif ($date == 2){
                            echo "b";
                        }
                        elseif ($date == 3){
                            echo "Good work $user->name! 2 more days to go!!";
                        }
                        elseif ($date == 4){
                            echo "d";
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