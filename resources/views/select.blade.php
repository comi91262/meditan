@extends('layouts.base')

@section('content')
<h1>問題の選択</h1>
{!! Form::open(['route' => 'menu.exam']) !!}

<section>
{{ Form::label('', 'Department を選択してください') }}
@foreach($departments as $department)
<div>
    {{ Form::checkbox('departments[]', $department) }}
    {{ Form::label('', $department) }}
</div>
@endforeach
</section>

<section>
{{ Form::label('', '問題文の言語を選択してください。') }}
<div>
{{ Form::radio('lang', 'jp') }}
    {{ Form::label('', '日本語') }}
{{ Form::radio('lang', 'en') }}
    {{ Form::label('', '英語') }}
</div>
</section>

{{ Form::submit('回答開始') }}

{!! Form::close() !!}
@endsection
