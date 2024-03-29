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
                    <td>Tytuł</td>
                    <td>Imie i Nazwisko</td>
                    <td></td>
                </tr>
            </thead>
            <tbody id="blog_list">
                @foreach ($requests as $request)
                <tr>
                    <td>{{ $request->title}}</td>
                    <td>{{ $request->fname}} {{ $request->lname}}</td>
                    <td>
                        <button class="btn btn-outline-info btn-sm" onclick="window.location.href='/userRequest/{{ $request->id}}'">Szczegóły</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $requests->links() }}
    </div>
</div>
@endsection
