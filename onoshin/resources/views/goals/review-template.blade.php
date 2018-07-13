@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="text-left">
                    <h1 class='page_title'>Smart Goals Template</h1>
                    <h3>Copy your Smart Goals below & paste it on your Daily Report</h3>
                        <div class="goals_template">
                            <?php foreach($goals as $key => $goal){ ?>
                            <p>{{ $key+1 }}. Goal: {{$goal->content}}<br/>
                            ・Accomplishment: {{$goal->rate}}%<br/>
                            ・Review: <br/>
                            ・Next Steps: <br/>
                            <br/>
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
                 <div class="buttons">
                      <a class="button button-showw" href="{{ route('goals.create') }}">
                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                      add Goals
                      </a>
               
                     <a class="button button-showww" href= "{{ route('goals.search')}}" >
                     <span class = "glyphicon glyphicon-search" area-hidden="true"></span>
                     search for Goals
                     </a>
                </div>            
            </div>
        </div>
    </div>
@endsection('content')