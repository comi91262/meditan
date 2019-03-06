@extends('layouts.base')

@section('content')
<div id="app">
    <question-history-component user-id={{ Auth::id() }}></question-history-component>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@endsection