<ul class="media-list">
    <li class="media">
        <div class="media-body">
            <div>
                @if(count($health) >0)
                    <div class="panel panel-primary" style="word-break:break-all;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Health</h3>
                        </div>
                        @include('goals.index', ['goals' => $health])
                    </div>
                @endif
            </div>
            <div>
                @if(count($private) >0)
                    <div class="panel panel-success" style="word-break:break-all;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Private</h3>
                        </div>
                        @include('goals.index', ['goals' => $private])
                    </div>
                @endif
            </div>
            <div>
                @if(count($communication) >0)
                    <div class="panel panel-info" style="word-break:break-all;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Communication</h3>
                        </div>
                        @include('goals.index', ['goals' => $communication])
                    </div>
                @endif
            </div>
            <div>
                @if(count($study) >0)
                    <div class="panel panel-warning" style="word-break:break-all;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Study</h3>
                        </div>
                        @include('goals.index', ['goals' => $study])
                    </div>
                @endif
            </div>
            <div>
                @if(count($work) >0)
                    <div class="panel panel-danger" style="word-break:break-all;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Work</h3>
                        </div>
                        @include('goals.index', ['goals' => $work])
                    </div>
                @endif
            </div>
            <div>
                @if (isset($goal->count))
                    <div class="panel-footer">
                        <p class="text-center">{{ $key+1 }}位: {{ $goal->count}} Good</p>
                    </div>
                @endif
            </div>
        </div>
    </li>
</ul>