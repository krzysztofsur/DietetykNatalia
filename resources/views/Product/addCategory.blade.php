@extends('layouts._LayoutPanel')
@section('title','Kategorie')
@section('styles')

@endsection

@section('main')

<button onclick="cleanInput()">Dodaj nowy </button>

<div class="row">
    <div class="col-lg-5">
        <label for="category">Lista kategorii</label>
        <input type="text" class="form-control" id="product_search" oninput="search_product()" placeholder="Szukaj...">
        <select multiple class="form-control" id="category" onchange="category_select()">
            @foreach ($categories as $category)
            <option value="{{ $category->id}}">{{ $category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-7">
        <div class="row">
            <div class="col-sm-6">
                <label for="category_name">Nazwa</label>
                <input type="text" class="form-control" id="category_name">
            </div>

        </div>

        <div class="row">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" id="id_category">
            <button type="button" class="btn btn-success" id="editCategory">Zapisz</button>
            <button type="button" class="btn btn-success" id="addCategory">Dodaj kategorię</button>
            <button class="btn btn-danger" onclick="categoryDelete()">Usuń</button>
        </div>
    </div>
</div>


@endsection

@section('script')
    <script src="{{ asset('js/functions/productsCategory.js') }}"></script>
@endsection