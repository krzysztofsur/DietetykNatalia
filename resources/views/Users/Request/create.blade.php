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
    <button class="btn btn-outline-info btn-sm SubmitCreate" >Stwórz</button>

    </div>
</div>
@endsection


@section('script')
<script>
$(document).ready(function(){

    ////////DELETE/////////////
    $('body').on('click', '.SubmitCreate', function (e) {
        e.preventDefault();
            var fname = $("#fname").val(),
                lname = $("#lname").val(),
                email = $("#email").val(),
                password = $("#password").val(),
                token = $("#_token").val();

                var form_data = new FormData();
                    form_data.append("fname",fname);
                    form_data.append("lname",lname);
                    form_data.append("password",password);
                    form_data.append("email",email);
                    form_data.append("_token",token);
            console.log(fname);
            $.ajax({
                method: "POST",
                url: "/createUser",
                data: form_data,
                contentType:false,
                cache:false,
                processData:false,
                })
                .done(function( msg ) {
                    console.log(msg);
                    //window.location.href='/UserRequest'
                    //toastr.success('Zostało usunięte');

                })
                .fail(function( msg) {
                    console.log(msg);
                    toastr.error('Wystąpił błąd');
                });
    });
});
        
</script>
@endsection