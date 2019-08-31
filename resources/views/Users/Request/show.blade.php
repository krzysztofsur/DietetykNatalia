@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Request')
@section('styles')

@endsection


@section('main')

<div class="row">
    <div class="col-12">

    <p>Tytuł: {{ $request->title}}</p>
    <p>Imie:{{ $request->fname}}</p>
    <p>Nazwisko:{{ $request->lname}}</p>
                        
    <p>Wiadomość: <br> {{ $request->message}}</p>
    
    <button class="btn btn-outline-info btn-sm requestDetails" id="{{ $request->id}}" onclick="window.location.href='/UserRequest/{{ $request->id}}'">Odpowiedz</button>
    <button class="btn btn-outline-warning btn-sm requestDelete" id="{{ $request->id}}" >Stwórz konto</button>
    </div>
</div>
@endsection
