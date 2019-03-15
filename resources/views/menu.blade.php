@extends('layouts.base')

@section('content')
<div id="app">
    <router-view></router-view>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@endsection 