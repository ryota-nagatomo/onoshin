@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                    <!--今は仮おき-->
                    <a href="{{ route('goals.review') }}" class="jet">review</a> 
                </div>
                <div class="panel-body">
                   <!-- チャート描画キャンバス -->
                  <div><canvas id="myChart" height="500px" width="300px"></canvas></div>
                  <script>

                    // 色の設定
                    var colorSet = {
                        	red: 'rgb(255, 99, 132)',
                         	orange: 'rgb(255, 159, 64)',
	                        yellow: 'rgb(255, 205, 86)',
                         	green: 'rgb(75, 192, 192)',
                         	blue: 'rgb(54, 162, 235)',
                         	purple: 'rgb(153, 102, 255)',
                         	grey: 'rgb(201, 203, 207)'
                    };
                    
                    var avg_study = {!! json_encode($avg_study) !!};
                    var avg_health = {!! json_encode($avg_health) !!};
                    var avg_communication = {!! json_encode($avg_communication) !!};
                    var avg_work = {!! json_encode($avg_work) !!};
                    var avg_private = {!! json_encode($avg_private) !!};
                    
                    
                    // 色のRGB変換
                    var color = Chart.helpers.color;

                    /*
                    * チャートの初期設定
                     */
                    var config = {
                        	type: 'radar',
                         	data: {
	                       	labels: ["health", "work", "study", "private", "communication"],
	                 	    datasets: [{
		                  	label: "last week",
			                backgroundColor: color(colorSet.red).alpha(0.5).rgbString(),
		           	        borderColor: colorSet.red,
			                pointBackgroundColor: colorSet.red,

			                data: ['$avg_health','$avg_work','$avg_study','$avg_private','$avg_communication' ]
			                
			                data: [10 ,10, 10, 10, 10]

	            	},{
		                	label: "this week",
			                backgroundColor: color(colorSet.blue).alpha(0.5).rgbString(),
			                borderColor: colorSet.blue,
			                pointBackgroundColor: colorSet.blue,

			                data: ['$avg_health','$avg_work','$avg_study','$avg_private','$avg_communication']

			                data: [avg_health, avg_work, avg_study, avg_private, avg_communication]

	              	},]
	                },
                        	options: {
	                     	animation:false,
		                    showTooltips: false,
	                    	legend: { position: 'bottom' },
		        title: {
		                	display: true,
		                 	fontSize:20,
			                fontColor:'#666',
			                text: 'Accomplishment'
		                },
	         	scale: {
			                display: true,
			                pointLabels: {
				            fontSize: 15,
				            fontColor: colorSet.yellow
			           },
			    ticks: {
			 	            display: true,
				            fontSize: 12,
				            fontColor: colorSet.green,
			 	            min: 0,
				            max: 100,
				            beginAtZero: true
			           },
		 	    gridLines: {
				            display: true,
				            color: colorSet.yellow
		            	}
		}
	}
};

           /*
           * チャートの作成
           */
           var myRadar = new Chart($("#myChart"), config);



           </script>

                </div>
                <!--画像の表示部分の分岐です-->
                <!--<div class="panel panel-default">-->
                <!--	<div class="panel-body">-->
                <!--		@if($kinoko < 5)-->
                <!--		  <img src=""></img>-->
                		  
                <!--		  @elseif($kinoko < 10)-->
                <!--		  <img src=""></img>-->
                		  
                <!--		  @else-->
                <!--		  <img src=""></img>-->
                		 
                <!--		@endif-->
                <!--	</div>-->
                <!--</div>-->
            </div>
           
            @include('user_follow.follow_button', ['user' => $user])
        </aside>
        <div class="col-xs-8">
        	<!--follow follower function-->
         <!--   <ul class="nav nav-tabs nav-justified">-->
         <!--       <li role="presentation" class="{{ Request::is('users/' . $user->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $user->id]) }}">Smart Goals</a></li>-->
         <!--       <li role="presentation" class="{{ Request::is('users/*/followings') ? 'active' : '' }}"><a href="{{ route('users.followings', ['id' => $user->id]) }}">Followings <span class="badge">{{ $count_followings }}</span></a></li>-->
         <!--       <li role="presentation" class="{{ Request::is('users/*/followers') ? 'active' : '' }}"><a href="{{ route('users.followers', ['id' => $user->id]) }}">Followers <span class="badge">{{ $count_followers }}</span></a></li>-->
         <!--   </ul>-->
            @if (count($health)+count($communication)+count($private)+count($study)+count($work) != 0)
                @include('goals.goals')
            @endif
        </div>
    </div>
@endsection