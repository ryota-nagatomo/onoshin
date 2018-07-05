<ul class="media-list">
@foreach ($goals as $goal)
    <?php $user = $goal->user; ?>
    <li class="media">
        <!--後でコンテンツを追加-->
        <!--<div class="media-left">-->
        <!--    <img class="media-object img-rounded" src="{{ Gravatar::src($user->name, 50) }}" alt="">-->
        <!--</div>-->
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $goal->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($goal->content)) !!}</p>
                <p>達成率: {!! nl2br(e($goal->rate)) !!}%</p>
            </div>
            <div>
                @if (Auth::id() == $goal->user_id)
                    {!! Form::open(['route' => ['goals.destroy', $goal->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $goals->render() !!}