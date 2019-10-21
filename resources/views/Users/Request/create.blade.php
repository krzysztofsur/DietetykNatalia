@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','User Create')
@section('styles')

@endsection


@section('main')

<div class="row">
    <div class="col-12">
    <h3>Sprawdzanie danych</h3>
  
    <table>
        <tr>
            <td><p>Imie:</p></td>
            <td><input type="text" id="fname" value="{{ $request->fname}}"></td>
        </tr>
        <tr>
            <td><p>Nazwisko:</p></td>
            <td><input type="text" id="lname" value="{{ $request->lname}}"></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
            <td><p>Login</p></td>
            <td><input type="text" id="email" value="{{ $request->email}}" disabled></td>
        </tr>
        <tr>
            <td><p>Hasło</p></td>
            <td><input type="text" id="password" value="{{ $password}}"></td>    
        </tr>
    </table>
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <button class="btn btn-outline-info btn-sm" onclick="SubmitCreate()">Stwórz</button>

    </div>
</div>
@endsection


@section('script')
<script src="{{ asset('js/functions/users.js') }}"></script>
@endsection