@extends('layouts.app')

@section('content')
<div id="app">
    <v-app>
        <header-component></header-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </v-app>
</div>
@endsection 