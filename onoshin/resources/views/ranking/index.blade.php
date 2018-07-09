<div class="panel-body box1">
    <table class="table">
	    <thead>
	        <tr>
	            <th>ユーザー</th>
		        <th>日付</th>
	        	<th>目標</th>
		        <th>達成率</th>
		        <th>Good</th>
		        <th>Ranking</th>
            </tr>
       </thead>
       <tbody>
           <?php foreach($goals as $key => $goal): ?>
            <tr>
                <?php $date = substr($goal->created_at,0,10); ?>
                <td></td>
                <td>{{ $date }}</td>
                <td>{{ $goal->content }}</td>
                <td>{{ $goal->rate }}%</td>
                <td>@include('good_user.good_button')</td>
                @if (isset($goal->count))
                <td>
                    <div class="panel-footer">
                        <p class="text-center">{{ $key+1 }}位: {{ $goal->count}} Good</p>
                    </div>
                </td>
                @endif
            </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
</div>