@extends('layouts.base')

@section('content')
<h1>問題の選択</h1>
{!! Form::open(['route' => 'menu.exam']) !!}

<section>
{{ Form::label('', 'Department を選択してください') }}
@foreach($departments as $department)
<div>
{{ Form::radio('department', $department) }}
    {{ Form::label('department', $department) }}
</div>
@endforeach
</section>

<section>
{{ Form::label('', '問題文の言語を選択してください。') }}
<div>
{{ Form::radio('lang', 'jp') }}
    {{ Form::label('lang', '日本語') }}
{{ Form::radio('lang', 'en') }}
    {{ Form::label('lang', '英語') }}
</div>
</section>

{{ Form::submit('回答開始') }}

{!! Form::close() !!}
@endsection
