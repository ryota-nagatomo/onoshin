<ul class="media-list">
    <li class="media">
        <!--後でコンテンツを追加-->
        <!--<div class="media-left">-->
        <!--    <img class="media-object img-rounded" src="{{ Gravatar::src($user->name, 50) }}" alt="">-->
        <!--</div>-->
        <div class="media-body">
             @include('goals.index', ['goals' => $goals])   
        </div>
    </li>
</ul>
{!! $goals->render() !!}