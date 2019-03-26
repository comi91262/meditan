@extends('layouts.base')

@section('content')
<div id="app">
    <v-app>
        <router-view></router-view>
    </v-app>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@endsection 