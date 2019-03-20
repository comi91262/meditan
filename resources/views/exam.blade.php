@extends('layouts.base')

@section('content')
    <div id="app">
        <exam-component></exam-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection