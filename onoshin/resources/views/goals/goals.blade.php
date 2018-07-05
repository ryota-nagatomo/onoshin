<ul class="media-list">
    <li class="media">
        <!--後でコンテンツを追加-->
        <!--<div class="media-left">-->
        <!--    <img class="media-object img-rounded" src="{{ Gravatar::src($user->name, 50) }}" alt="">-->
        <!--</div>-->
        <div class="media-body">
            <div>
                @if(count($health) >0)
                    <div class="panel panel-primary" style="word-break:break-all;">
                        <div class="panel-heading">
                            <h3 class="panel-title">健康管理</h3>
                        </div>
                        @include('goals.index', ['goals' => $health])
                    </div>
                @endif
            </div>
            <div>
                @if(count($own) >0)
                    <div class="panel panel-primary" style="word-break:break-all;">
                        <div class="panel-heading">
                            <h3 class="panel-title">自己啓発</h3>
                        </div>
                        @include('goals.index', ['goals' => $own])
                    </div>
                @endif
            </div>
            <div>
                @if(count($people) >0)
                    <div class="panel panel-primary" style="word-break:break-all;">
                        <div class="panel-heading">
                            <h3 class="panel-title">人間関係</h3>
                        </div>
                        @include('goals.index', ['goals' => $people])
                    </div>
                @endif
            </div>
            <div>
                @if(count($english) >0)
                    <div class="panel panel-primary" style="word-break:break-all;">
                        <div class="panel-heading">
                            <h3 class="panel-title">英語</h3>
                        </div>
                        @include('goals.index', ['goals' => $english])
                    </div>
                @endif
            </div>
            <div>
                @if(count($other) >0)
                    <div class="panel panel-primary" style="word-break:break-all;">
                        <div class="panel-heading">
                            <h3 class="panel-title">その他</h3>
                        </div>
                        @include('goals.index', ['goals' => $other])
                    </div>
                @endif
            </div>
        </div>
    </li>
</ul>