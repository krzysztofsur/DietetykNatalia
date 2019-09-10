@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','User Create')
@section('styles')

@endsection


@section('main')

<div class="row">
    <div class="col-12">
    <h3>Dodaj Użytkownika</h3>
  
    <table>
        <tr>
            <td><p>Imie:</p></td>
            <td><input type="text" id="fname" ></td>
        </tr>
        <tr>
            <td><p>Nazwisko:</p></td>
            <td><input type="text" id="lname"></td>
        </tr>
        <tr><td><br></td></tr>
        <tr>
            <td><p>Email</p></td>
            <td><input type="email" id="email" ></td>
        </tr>
        <tr>
            <td><p>Hasło</p></td>
        <td><input type="text" id="password" value="{{ $password }}"></td>    
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

    ////////Add/////////////
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
                    //window.location.href='/UserRequest'
                    //toastr.success('Zostało usunięte');

                })
                .fail(function( msg) {
                    toastr.error('Wystąpił błąd');
                });
    });
});
        
</script>
@endsection