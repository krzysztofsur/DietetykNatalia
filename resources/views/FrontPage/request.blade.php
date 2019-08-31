@extends('layouts._LayoutFront')

<?php $activeMainMenu='request' ?>
@section('title','request')


@section('main')

<section id="motto">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Dietetyk Natalia</h1>
                <h4>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, ratione veritatis
                    consequuntur nihil nam numquam doloribus animi quaerat non id, unde asperiores facere cupiditate
                    molestias totam, minus eum. Sint, consequuntur!
                </h4>
            </div>
        </div>
    </div>
</section>


<section id="contact">
    <header>
        <h2>Chcesz zostać klientem napisz!</h2>
        <h5>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, laudantium enim? Explicabo aliquam
            assumenda molestiae voluptas eveniet, amet asperiores quisquam illum fugiat. Illo praesentium, repellat
            dolorum amet dolor quo saepe!
        </h5>
    </header>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
            <label for="title">Temat</label>
            <input type="text" class="form-control" id="title" placeholder="Temat">
        </div>
        <div class="form-group col-md-6">
            <label for="fname">Imie</label>
            <input type="text" class="form-control" id="fname" placeholder="Imie">
        </div>
        <div class="form-group col-md-6">
            <label for="lname">Nazwisko</label>
            <input type="text" class="form-control" id="lname" placeholder="Nazwisko">
        </div>
    </div>
    <div class="form-group">
        <label for="message">Wiadomość</label>
        <textarea class="form-control" id="message" rows="3"></textarea>
    </div>
    <div class="form-group">
        <p><input type="checkbox" class="zgrequest1"> Zgoda rodo 1</p>

        <p><input type="checkbox" class="zgrequest2"> Zgoda rodo 2</p>
    </div>
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <input class="btn btn-primary" type="submit" id="requestSubmit" value="Wyślij">

</section>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        ////////Send/////////////
        $("#requestSubmit").click(function(){
            console.log("(^.^)");
            if ( true) {
                //$('input.zgrequest1').is(':checked') && $('input.zgrequest2').is(':checked')
                console.log(':)');

                var title = $('#title').val(),
                    _token = $('#_token').val(),
                    email = $('#email').val(),
                    fname = $('#fname').val(),
                    lname = $('#lname').val(),
                    message = $('#message').val();

                var form_data = new FormData();
                form_data.append("email",email);
                form_data.append("_token",_token);
                form_data.append("title",title);
                form_data.append("fname",fname);
                form_data.append("lname",lname);
                form_data.append("message",message);
                $.ajax({
                    method: "POST",
                    url: "/userRequestSend",
                    data: form_data,
                    contentType:false,
                    //cache:false,
                    processData:false,
                     })
                    .done(function( msg ) {
                        console.log(msg);
                        toastr.success('Zostało wysłane');
                    })
                    .fail(function( msg) {
                        console.log(msg);
                         toastr.error('Wystąpił błąd');
                    });
            } else {
                console.log(":(");
                //return false;
             }
        });
    });

</script>

@endsection