@extends('layouts._LayoutPanel')
@section('title','Produkty')
@section('styles')

@endsection

@section('main')

<button onclick="cleanInput()">Wyczyść wszystko</button>
<button onclick="window.location.href='/addCategory'" class="btn bg-blue waves-effect pull-right">Dodaj kategorię</button>

<div class="row">
    <div class="col-sm-4">
        <label for="product">Lista produktów</label>
        <input type="text" class="form-control" id="product_search" oninput="refreshList()" placeholder="Szukaj...">
        <select class="form-control show-tick" onchange="refreshList()" id="product_search_category">
                <option value="0">Wybierz kategorię</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name}}</option>
            @endforeach
        </select>
        <br/>
        <select multiple class="form-control" id="product" onchange="product_select()">
            @foreach ($products as $product)
            <option value="{{ $product->id}}">{{ $product->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-6">
                <label for="product_name">Nazwa</label>
                <input type="text" class="form-control" id="product_name">
            </div>
            <div class="col-sm-6">
                <label for="product_category">Kategoria</label>
                <select class="form-control show-tick" id="product_category">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-3 col-xs-6">
                <label for="product_bl">Białka</label>
                <input type="number" class="form-control" id="product_protein" value="0">
            </div>
            <div class="col-sm-3 col-xs-6">
                <label for="product_wegle">Węglowodany</label>
                <input type="number" class="form-control" id="product_carbohydrates" value="0">
            </div>
            <div class="col-sm-3 col-xs-6">
                <label for="product_fats">Tłuszcze</label>
                <input type="number" class="form-control" id="product_fats" value="0">
            </div>
            <div class="col-sm-3 col-xs-6">
                <label for="product_calories">Kalorie</label>
                <input type="number" class="form-control" id="product_calories" value="0">
            </div>

            <div class="col-sm-3 col-xs-6">
                <label for="product_Ca">Ca</label>
                <input type="number" class="form-control" id="product_Ca" value="0">
            </div>
            <div class="col-sm-3 col-xs-6">
                <label for="product_K">K</label>
                <input type="number" class="form-control" id="product_K" value="0">
            </div>
            <div class="col-sm-3 col-xs-6">
                <label for="product_Fe">Fe</label>
                <input type="number" class="form-control" id="product_Fe" value="0">
            </div>
            <div class="col-sm-3 col-xs-6">
                <label for="product_Na">Na</label>
                <input type="number" class="form-control" id="product_Na" value="0">
            </div>

            <div class="col-sm-3 col-xs-6">
                <label for="product_blonnik">Błonnik</label>
                <input type="number" class="form-control" id="product_blonnik" value="0">
            </div>
            <div class="col-sm-3 col-xs-6">
                <label for="product_vitamin_c">Witamina C</label>
                <input type="number" class="form-control" id="product_vitamin_c" value="0">
            </div>
            <div class="col-sm-3 col-xs-6">
                <label for="product_kwasy_nasycone">Kwasy nasycone</label>
                <input type="number" class="form-control" id="product_kwasy_nasycone" value="0">
            </div>
            <div class="col-sm-3 col-xs-6">
                <label for="product_kwasy_nienasycone">Kwasy nienasycone</label>
                <input type="number" class="form-control" id="product_kwasy_nienasycone" value="0">
            </div>

            <div class="col-sm-3 col-xs-6">
                <label for="product_cholesterol">cholesterol</label>
                <input type="number" class="form-control" id="product_cholesterol" value="0">
            </div>
            <div class="col-sm-3 col-xs-6">
                <label for="product_vitamin_b12">Witamina B12</label>
                <input type="number" class="form-control" id="product_vitamin_b12" value="0">
            </div>

        </div>

        <div class="row">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" id="id_product">
            <button type="button" class="btn btn-success" onclick="addProduct()">Dodaj produkt</button>
            <button type="button" class="btn btn-success" onclick="editProduct()">Edytuj produkt</button>

            <button class="btn btn-danger" onclick="product_Delete()">Usuń</button>
            <!--<button class="btn btn-success" onclick="location.href='./product_category.php'">Kategorie</button>-->
        </div>
    </div>
</div>


@endsection

@section('script')
<script src="{{ asset('js/functions/products.js') }}"></script>
<script src="{{ asset('js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/additional-methods.js') }}"></script>
@endsection