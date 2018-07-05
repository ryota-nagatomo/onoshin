    <div class="panel-body box1">
        <table class="table">
		    <thead>
		        <tr>
			        <th>日付</th>
		        	<th>目標</th>
			        <th>達成率</th>
			        <th>Good</th>
	            </tr>
	       </thead>
	       <tbody>
	           <?php foreach($goals as $goal): ?>
                <tr>
                    <?php $date = substr($goal->created_at,0,10); ?>
                    <td>{{ $date }}</td>
                    <td>{{ $goal->content }}</td>
                    <td>{{ $goal->rate }}%</td>
                    <td>@include('good_user.good_button')</td>
                </tr>
                <?php endforeach; ?>
	        </tbody>
	   </table>
    </div>
