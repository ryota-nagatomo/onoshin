<div class="panel panel-default" style="word-break:break-all;">
    <div class="panel-heading">
        <h3 class="panel-title">カテゴリ</h3>
    </div>
    <div class="panel-body box1">
        <table class="table">
		    <thead>
		        <tr>
			        <th>日付</th>
		        	<th>目標</th>
			        <th>達成率</th>
	            </tr>
	       </thead>
	       <tbody>
	           <?php foreach($goals as $goal): ?>
                <tr>
                    <?php $date = substr($goal->created_at,0,10); ?>
                    <td>{{ $date }}</td>
                    <td>{{ $goal->content }}</td>
                    <td>{{ $goal->rate }}%</td>
                </tr>
                <?php endforeach; ?>
	        </tbody>
	   </table>
    </div>
</div>