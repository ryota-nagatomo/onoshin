<div class="panel-body ranking-box">
    <table class="table">
	    <thead>
	        <tr>
	        	<th>Smart Goals</th>
            </tr>
       </thead>
       <tbody>
           <?php foreach($goals as $goal): ?>
            <tr>
                <td>{{ $goal->content }}</td>
                <td>@include('good_user.good_button')</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
   </table>
</div>