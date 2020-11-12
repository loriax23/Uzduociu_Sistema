@extends('layouts.app-admin')

@section('content-admin')
    <div class="jumbotron bg-white text-center">
        <h1 class="display-4">Užduočių Sistema</h1>
        <p class="lead">Sveiki, {{ $user->name }}, linkime jums geros dienos 😊</p>
        <hr class="my-4">
        <p></p>
    </div>
    @endsection
