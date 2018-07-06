<div class="form-group">
    {!! Form::label('content', '目標:') !!}
        {!! Form::text('content', old('content'), ['class' => 'form-control','placeholder' => 'Smart Goalを入力']) !!}
</div>
<div class="form-group">
    {!! Form::label('rate', '達成率:') !!}
    {!! Form::text('rate', old('rate'), ['class' => 'form-control','placeholder' => '半角数字を入力']) !!}%
</div>
<div class="form-group">
    {!! Form::label('category', 'カテゴリー:') !!}
    {!! Form::select('category', [
        '' => 'カテゴリを選択',
        '0' => '英語',
        '1' => '自己啓発',
        '2' => '人間関係',
        '3' => '健康管理',
        '4' =>'その他'], null, ['class' => 'form-control'])!!}      
        <!--カテゴリはまた考える-->
</div>
