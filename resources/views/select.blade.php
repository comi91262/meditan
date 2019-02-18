@extends('layouts.base')

@section('content')
<h1>問題の選択</h1>
{!! Form::open(['route' => 'menu.exam']) !!}

<div>
@foreach($departments as $department)
{{ Form::radio('department', $department) }}
    {{ Form::label('department', $department) }}
@endforeach
</div>

<div>
{{ Form::label('', 'どちらで問題を解きますか') }}
{{ Form::radio('lang', 'jp') }}
    {{ Form::label('lang', '日本語') }}
{{ Form::radio('lang', 'en') }}
    {{ Form::label('lang', '英語') }}
</div>

{{ Form::submit('回答開始') }}

{!! Form::close() !!}
@endsection
