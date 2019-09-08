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
    
    <button class="btn btn-outline-info btn-sm requestDetails" id="{{ $request->id}}" onclick="window.location.href='/UserRequest/{{ $request->id}}'">Odpowiedz</button>
    <button class="btn btn-outline-info btn-sm requestDelete" id="{{ $request->id}}" >Stwórz konto</button>
    <button class="btn btn-outline-warning btn-sm DeleteRequest" id="{{ $request->id}}" >Usuń</button>

    </div>
</div>
@endsection


@section('script')
<script>
$(document).ready(function(){

    ////////DELETE/////////////
    $('body').on('click', '.DeleteRequest', function (e) {
        e.preventDefault();
        if (confirm('Czy napewno chcesz usunąć?')) {
            var id = $(this).attr('id');
            $.ajax({
                method: "DELETE",
                url: "/UserRequest/"+id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                    }
                })
                .done(function( msg ) {
                    window.location.href='/UserRequest'
                    //toastr.success('Zostało usunięte');

                })
                .fail(function( msg) {
                    toastr.error('Wystąpił błąd');
                });
        } else {
            return false;
        }
    });
});
        
</script>
@endsection