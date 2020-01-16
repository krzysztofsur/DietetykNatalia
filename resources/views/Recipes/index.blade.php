@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Blog')
@section('styles')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=fqnmeurrl0ry206hcbd9m1dnhcflolt0mbr4u4ye7rvw11gc">
</script>
<script>
    tinymce.init({ selector:'textarea' });
</script>
@endsection

@section('main')

<div class="row">
    <div class="col-lg-5">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <td>Tytuł</td>
                    <td>Data</td>
                    <td></td>
                </tr>
            </thead>
            <tbody id="blog_list">
                @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->title}}</td>
                    <td>{{ date('Y-m-d', strtotime($recipe->updated_at))}}</td>
                    <td>
                        <button class="btn btn-outline-info btn-sm" onclick="blogEdit({{ $recipe->id}})">Edycja</button>
                        <button class="btn btn-outline-warning btn-sm" onclick="blogDelete({{ $recipe->id}})">Usuń</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $recipes->links() }}
    </div>
    <div class="col-lg-6" id="input_blog">

        <div class="row">
            <label for="title">Tytuł</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="row">
            <label for="title">Kategoria</label>
            <select class="form-control" id="category">
                <option value="Przepisy">Przepisy</option>
                <option value="Ciekawostki">Ciekawostki</option>
            </select>
        </div>
        <div class="row">
            <label for="short">Krótki opis</label>
            <textarea id="short" style="width:100%"></textarea>
        </div>
        <div class="row">
            <label for="description">Treść</label>
            <textarea id="description" style="width:100%"></textarea>
        </div>
        <div class="row">
            Dodaj zdjęcie o wielkości <input type="file" name='file' id="imgs">
            <img src="" id="imgs_file">
        </div>
        <div class="row">
            <input type="hidden" name="id" id="id_blog">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <button onclick="addPost()">Zapisz</button>
        </div>

    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/functions/recipes.js') }}"></script>

<script>
    
        
</script>
@endsection