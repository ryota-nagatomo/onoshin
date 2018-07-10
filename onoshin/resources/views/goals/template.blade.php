@extends('layouts.app')

@section('content')
<h1>Smart Goals Template</h1>
<p>1. Goal: {{$content}}<br/>
・Accomplishment: {{$rate}}%<br/>
・Review: <br/>
・Next Steps: <br/>
<br/>
<?php if(isset($content2) && isset($rate2)){ ?>
2.Goal: {{$content2}}<br/>
・Accomplishment: {{$rate2}}%<br/>
・Review: <br/>
・Next Steps: <br/>
<br/>
<?php } ?>
<?php if(isset($content3) && isset($rate3)){ ?>
3.Goal: {{$content3}}<br/>
・Accomplishment: {{$rate3}}%<br/>
・Review: <br/>
・Next Steps: <br/>
</p>
<?php } ?>
@endsection('content')