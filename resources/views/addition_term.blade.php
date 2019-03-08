@extends('layouts.base')

@section('content')
<div id="app">
        <addition-term-component user-id={{ Auth::id() }}></addition-term-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
<style>
@endsection


