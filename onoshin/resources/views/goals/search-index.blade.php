    <div class="panel-body search-box">
        <table class="table table-hover">
		    <thead>
		        <tr>
			        <th>ユーザー</th>
		        	<th>目標</th>
			        <th>達成率</th>
			        <th>日付</th>
			        <th>Keep</th>
			        <th>Delete</th>
	            </tr>
	       </thead>
	       <tbody>
	           <?php foreach($goals as $goal): ?>
                <tr>
                    <?php $user = $goal->user->name; ?>
                    <?php $date = substr($goal->created_at,0,10); ?>
                    <td>{{ $user }}</td>
                    <td>{{ $goal->content }}</td>
                    <td>{{ $goal->rate }}%</td>
                    <td>{{ $date }}</td>
                    <td>@include('good_user.good_button')</td>
                    @if (Auth::user()->id == $goal->user_id)
                    <td>
                        {!! Form::open(['route' => ['goals.destroy', $goal->id], 'method' => 'delete']) !!}
                            <button type="submit" class="btn btn-original"><span class='glyphicon glyphicon-trash'></span></button>
                        {!! Form::close() !!}
                    </td>
                    @endif
                </tr>
                <?php endforeach; ?>
	        </tbody>
	   </table>
    </div>
