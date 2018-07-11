 <div class="panel-body index-box">
        <table class="table">
		    <thead>
		        <tr>
		            <th>ユーザー</th>
			        <th>日付</th>
		        	<th>目標</th>
			        <th>達成率</th>
			        <th></th>
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
                    <td> @if (isset($goal->count))
                            <div class="panel-footer">
                                <p class="text-center">{{ $key+1 }}位: {{ $goal->count}} Good</p>
                            </div>
                        @endif</td>
                </tr>
                <?php endforeach; ?>
	        </tbody>
	   </table>
    </div>