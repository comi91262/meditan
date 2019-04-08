@extends('layouts.app')

@section('content')
<div id="app">
    <v-app>
        <router-view></router-view>
        <footer-component></footer-component>
    </v-app>
</div>
@endsection 