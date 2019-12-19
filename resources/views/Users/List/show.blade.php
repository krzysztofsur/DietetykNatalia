@extends('layouts._LayoutPanel')
@section('title','Request')
@section('styles')

@endsection


@section('main')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#personalData" data-toggle="tab">HOME</a></li>
            <li role="presentation"><a href="#profile" data-toggle="tab">PROFILE</a></li>
            <li role="presentation"><a href="#messages_animation_1" data-toggle="tab">MESSAGES</a></li>
            <li role="presentation"><a href="#settings_animation_1" data-toggle="tab">SETTINGS</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane animated flipInX active" id="personalData">
                <b>Dane Personalne</b>
                <p>Imie:</p>
                <p>{{ $personalData->firstname}}</p>
                
                <p>
                    <table style="width: 100%;">
                        <thead>
                            <tr>
                                <td>Email</td>
                                <td>Imie i Nazwisko</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="blog_list">
                            <tr>
                                <td>{{ $user->email}}</td>
                                <td>{{ $personalData->firstname}} {{ $personalData->lastname}}</td>
                                <td>
                                    <button class="btn btn-outline-info btn-sm"
                                        onclick="window.location.href='/userList/{{ $user->id}}'">Szczegóły</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </p>
            </div>
            <div role="tabpanel" class="tab-pane animated flipInX" id="profile">
                <b>Profile Content</b>
                <p>
                    Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation
                    electram moderatius.
                    Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent
                    aliquid pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere
                    gubergren sadipscing mel.
                </p>
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