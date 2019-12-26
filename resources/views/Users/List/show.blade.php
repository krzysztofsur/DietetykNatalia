@extends('layouts._LayoutPanel')
@section('title')
Dane użytkownika
<button onclick="window.location.href='/userList/{{$user->id}}/diet'" class="pull-right">Diety</button>
@endsection
@section('styles')

@endsection


@section('main')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#personalData" data-toggle="tab">Dane</a></li>
            <li role="presentation"><a href="#profile" data-toggle="tab">Pomiary</a></li>
            <li role="presentation"><a href="#messages_animation_1" data-toggle="tab">MESSAGES</a></li>
            <li role="presentation"><a href="#settings_animation_1" data-toggle="tab">SETTINGS</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane animated flipInX active" id="personalData">
                <h4>Dane Personalne</h4>
                <div class="col-md-6">
                    <label for="firstname">Imie:</label>
                    <p id="firstname">{{ $personalData->firstname}}</p>

                    <label for="lastname">Nazwisko:</label>
                    <p id="lastname">{{ $personalData->lastname}}</p>

                    <label for="sex">Płeć:</label>
                    <p id="sex">{{ $gender }}</p>

                </div>

                <div class="col-md-6">
                    <label for="birthdate">Data urodzenia:</label>
                    <p id="birthdate">{{ $personalData->birthdate }} ({{$age}}) </p>

                    <label for="phone">Telefon:</label>
                    <p id="phone">{{ $personalData->phone }}</p>

                    <label for="email">Email:</label>
                    <p id="email">{{ $user->email }}</p>



                </div>
            </div>

            <div role="tabpanel" class="tab-pane animated flipInX" id="profile">
                    <h4>Pomiary</h4>
                    <div class="col-md-6">
                        <label for="weight">Waga:</label>
                        <p id="weight">{{ $measurement->weight }}</p>

                        <label for="height">Wzrost:</label>
                        <p id="height">{{ $measurement->height }}</p>

                        <label for="waist">Talia:</label>
                        <p id="waist">{{ $measurement->waist }}</p>

                        <label for="stomach">Brzuch:</label>
                        <p id="stomach">{{ $measurement->stomach }}</p>

                        <label for="hips">Biodra:</label>
                        <p id="hips">{{ $measurement->hips }}</p>

                    </div>

                    <div class="col-md-6">
                        <label for="neck">Kark:</label>
                        <p id="neck">{{ $measurement->neck }}</p>

                        <label for="wrist">Nadgarstki:</label>
                        <p id="wrist">{{ $measurement->wrist }}</p>

                        <label for="thigh">Uda:</label>
                        <p id="thigh">{{ $measurement->thigh }}</p>

                        <label for="biceps">Biceps:</label>
                        <p id="biceps">{{ $measurement->biceps }}</p>

                        <label for="chest">Klatka:</label>
                        <p id="chest">{{ $measurement->chest }}</p>
                    </div>
                <!-- $measurement -->

            </div>

            <div role="tabpanel" class="tab-pane animated flipInX" id="messages_animation_1">
                <b>Message Content</b>
                <p>
                    Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation
                    electram moderatius.
                    Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent
                    aliquid pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere
                    gubergren sadipscing mel.
                </p>
            </div>

            <div role="tabpanel" class="tab-pane animated flipInX" id="settings_animation_1">
                <b>Settings Content</b>
                <p>
                    Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation
                    electram moderatius.
                    Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent
                    aliquid pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere
                    gubergren sadipscing mel.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection