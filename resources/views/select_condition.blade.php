@extends('layouts.base')

@section('content')
<h1>問題の選択</h1>

<style>
.alert {
    color: #FF0000;
}
</style>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['route' => 'menu.exam_condition']) !!}

<section>
{{ Form::label('', '出題数を選択してください。') }}
<div>
{{ Form::radio('number', 'ten') }}
    {{ Form::label('', '10') }}
{{ Form::radio('number', 'twenty') }}
    {{ Form::label('', '20') }}
{{ Form::radio('number', 'all') }}
    {{ Form::label('', '全て') }}
</div>
</section>

{{ Form::submit('回答開始') }}

{!! Form::close() !!}
@endsection
