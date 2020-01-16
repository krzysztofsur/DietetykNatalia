@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Lista Użytkowników')
@section('styles')

@endsection


@section('main')

<div class="row">
    <div class="col-12">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <td>Imie</td>
                    <td>Email</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody id="blog_list">
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>
                        <button class="btn btn-outline-info btn-sm" onclick="window.location.href='/userList/{{ $user->id}}'">Szczegóły</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>

@endsection
