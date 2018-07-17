@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="text-left">
                    <h1 class='page_title'>Smart Goals Template</h1>
                    <h3>Copy your Smart Goals below & paste it on your Daily Report</h3>
                        <div class="goals_template">
                            <p id='targetID'>SMART Goal 1: {{$content}}<br/>
                                	Why→
                            <br/>
                            <?php if(isset($content2)){ ?>
                            SMART Goal 2: {{$content2}}<br/>
                                	Why→
                            <br/>
                            <?php } ?>
                            <?php if(isset($content3)){ ?>
                            SMART Goal 3: {{$content3}}<br/>
                                	Why→
                            <br/>
                            </p>
                            <?php } ?>
                            
                        </div>
                        <button id='btnCopy' class="btn"><span class='glyphicon glyphicon-copy'>copy</span></button>
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
    <!--コピーのscript-->
    <script>
        document.querySelector('#btnCopy').addEventListener("click", function(){
          var element = document.querySelector('#targetID');
          var selection = window.getSelection();
          var range = document.createRange();
          range.selectNodeContents(element);
          selection.removeAllRanges();
          selection.addRange(range);
          //console.log('選択された文字列: ', selection.toString());
          var succeeded = document.execCommand('copy');
          if (succeeded) {
              alert('コピーが成功しました！');
          } else {
              alert('コピーが失敗しました!');
          }
          selection.removeAllRanges();
        
        });
    </script>
@endsection('content')