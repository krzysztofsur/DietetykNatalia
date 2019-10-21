@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Request')
@section('styles')

@endsection


@section('main')

<div class="row">
    <div class="col-12">

    <p>Tytuł: {{ $request->title}}</p>
    <p>Imie: {{ $request->fname}}</p>
    <p>Nazwisko: {{ $request->lname}}</p>

    <p>Wiadomość: <br> {{ $request->message}}</p>
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    
    <button class="btn btn-outline-info btn-sm" id="{{ $request->id}}" onclick="window.location.href='/userRequest/{{ $request->id}}'">Odpowiedz</button>
    <button class="btn btn-outline-info btn-sm" onclick="window.location.href='/userRequest_Creator/{{ $request->id}}'">Stwórz konto</button>
    <button class="btn btn-outline-warning btn-sm " onclick="deleteRequest({{ $request->id}})">Usuń</button>

    </div>
</div>
@endsection


@section('script')
<script src="{{ asset('js/functions/users.js') }}"></script>
@endsection