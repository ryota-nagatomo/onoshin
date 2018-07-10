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
        '0' => 'Study',
        '1' => 'Private',
        '2' => 'Communication',
        '3' => 'Health',
        '4' =>'Work'], null, ['class' => 'form-control'])!!}      
</div>
