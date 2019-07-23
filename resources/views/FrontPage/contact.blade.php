@extends('layouts._LayoutFront')

<?php $activeMainMenu='contact' ?>
@section('title','Contact')


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
        <h2>Masz pytania napisz!</h2>
        <h5>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa, laudantium enim? Explicabo aliquam
            assumenda molestiae voluptas eveniet, amet asperiores quisquam illum fugiat. Illo praesentium, repellat
            dolorum amet dolor quo saepe!
        </h5>
    </header>
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="title">Temat</label>
                <input type="text" class="form-control" id="title" placeholder="Temat">
            </div>
        </div>
        <div class="form-group">
            <label for="message">Wiadomość</label>
            <textarea class="form-control" id="message" rows="3"></textarea>
        </div>
    </form>
</section>
@endsection