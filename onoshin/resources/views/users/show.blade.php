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
                    
                    var avg_study_this = {!! json_encode($avg_study_this) !!};
                    var avg_health_this = {!! json_encode($avg_health_this) !!};
                    var avg_communication_this = {!! json_encode($avg_communication_this) !!};
                    var avg_work_this = {!! json_encode($avg_work_this) !!};
                    var avg_private_this = {!! json_encode($avg_private_this) !!};
                    
                    var avg_study_last = {!! json_encode($avg_study_last) !!};
                    var avg_health_last = {!! json_encode($avg_health_last) !!};
                    var avg_communication_last = {!! json_encode($avg_communication_last) !!};
                    var avg_work_last = {!! json_encode($avg_work_last) !!};
                    var avg_private_last = {!! json_encode($avg_private_last) !!};

                    
                    
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
			                data: [avg_health_last, avg_work_last, avg_study_last, avg_private_last, avg_communication_last]
	            	},{
		                	label: "this week",
			                backgroundColor: color(colorSet.blue).alpha(0.5).rgbString(),
			                borderColor: colorSet.blue,
			                pointBackgroundColor: colorSet.blue,
			                data: [avg_health_this, avg_work_this, avg_study_this, avg_private_this, avg_communication_this]

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