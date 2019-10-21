@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Request')
@section('styles')

@endsection


@section('main')

<div class="row">
    <div class="col-12">
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
                    <td>{{ $user->name}} {{ $user->email}}</td>
                    <td>
                        <button class="btn btn-outline-info btn-sm" onclick="window.location.href='/userList/{{ $user->id}}'">Szczegóły</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
