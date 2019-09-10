@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Blog Add')
@section('styles')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=fqnmeurrl0ry206hcbd9m1dnhcflolt0mbr4u4ye7rvw11gc">
</script>
<script>
    tinymce.init({ selector:'textarea' });
</script>
@endsection

@section('main')


<div class="row">
    <div class="col-3">
        <label for="product">Lista produktów</label>
        <input type="text" id="product_search" oninput="search_product()" placeholder="Szukaj...">
        <select multiple class="form-control" id="product" onchange="product_select()">
            @foreach ($products as $product)
            <option value="{{ $product->id}}">{{ $product->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-9">
        <div class="row">
            <div class="col-6">
                <label for="product_name">Nazwa</label>
                <input type="text" class="form-control" id="product_name">
            </div>
            <div class="col-6">
                <label for="product_category">Kategoria</label>
                <select class="form-control" id="product_category">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-3">
                <label for="product_bl">Białka</label>
                <input type="number" class="form-control" id="product_protein" value="0">
            </div>
            <div class="col-3">
                <label for="product_wegle">Węglowodany</label>
                <input type="number" class="form-control" id="product_carbohydrates" value="0">
            </div>
            <div class="col-3">
                <label for="product_fats">Tłuszcze</label>
                <input type="number" class="form-control" id="product_fats" value="0">
            </div>
            <div class="col-3">
                <label for="product_calories">Kalorie</label>
                <input type="number" class="form-control" id="product_calories" value="0">
            </div>

            <div class="col-3">
                <label for="product_Ca">Ca</label>
                <input type="number" class="form-control" id="product_Ca" value="0">
            </div>
            <div class="col-3">
                <label for="product_K">K</label>
                <input type="number" class="form-control" id="product_K" value="0">
            </div>
            <div class="col-3">
                <label for="product_Fe">Fe</label>
                <input type="number" class="form-control" id="product_Fe" value="0">
            </div>
            <div class="col-3">
                <label for="product_Na">Na</label>
                <input type="number" class="form-control" id="product_Na" value="0">
            </div>

            <div class="col-3">
                <label for="product_blonnik">Błonnik</label>
                <input type="number" class="form-control" id="product_blonnik" value="0">
            </div>
            <div class="col-3">
                <label for="product_vitamin_c">Witamina C</label>
                <input type="number" class="form-control" id="product_vitamin_c" value="0">
            </div>
            <div class="col-3">
                <label for="product_kwasy_nasycone">Kwasy nasycone</label>
                <input type="number" class="form-control" id="product_kwasy_nasycone" value="0">
            </div>
            <div class="col-3">
                <label for="product_kwasy_nienasycone">Kwasy nienasycone</label>
                <input type="number" class="form-control" id="product_kwasy_nienasycone" value="0">
            </div>

            <div class="col-3">
                <label for="product_cholesterol">cholesterol</label>
                <input type="number" class="form-control" id="product_cholesterol" value="0">
            </div>
            <div class="col-3">
                <label for="product_vitamin_b12">Witamina B12</label>
                <input type="number" class="form-control" id="product_vitamin_b12" value="0">
            </div>

        </div>

        <div class="row">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" id="id_product">
            <button type="button" class="btn btn-success" id="product_save">Zapisz</button>
            <button class="btn btn-danger" onclick="product_Delete()">Usuń</button>
            <!--<button class="btn btn-success" onclick="location.href='./product_category.php'">Kategorie</button>-->
        </div>
    </div>
</div>


@endsection

@section('script')
<script>

$("#id_product").val(0);
show_products();
function product_Delete() {
    var res = confirm('Czy napewno chcesz usunąć?');
    if(res) {
        console.log($('#product_vitamin_b12').val());
        $.ajax({
            method: "POST",
            url: "./db/product/productDelete.php",
            data: { id: $("#id_product").val() }
        })
            .done(function (msg) {
                show_products()
            })
            .fail(function () {
                toastr.error('Wystąpił błąd');
            });
    }
}

function show_products() {
    $.ajax({
    method: "GET",
    url: "/products/reload",
    data: {"_token": $("#_token").val()},
    
    })
        .done(function (msg) {
            console.log(msg);
            //var tab = $.parseJSON(msg);

            $('#product').html("");
            for (let i = 0; i < tab.length; i++) {
                $('#product').append('<option value="' + tab[i].id_product + '">' + tab[i].name + '</option>');
            }
            $('#id_product').val('');
            $('#product_name').val(0);
            $('#product_calory').val(0);
            $('#product_protein').val(0);
            $('#product_Ca').val(0);
            $('#product_K').val(0);
            $('#product_Mg').val(0);
            $('#product_Na').val(0);
            $('#product_carbohydrates').val(0);
            $('#product_fat').val(0);
            $('#product_category').val('');
        })
        .fail(function () {
            toastr.error('Wystąpił błąd');
        });
}

    //show_products();
    $(document).ready(function(){
        

        function show_products() {
            $.ajax({
                method: "GET",
                url: "./db/product/productGet.php",
                dataType: "script"
            })
                .done(function (msg) {
                    var tab = $.parseJSON(msg);

                    $('#product').html("");
                    for (let i = 0; i < tab.length; i++) {
                        $('#product').append('<option value="' + tab[i].id_product + '">' + tab[i].name + '</option>');
                    }
                    $('#id_product').val('');
                    $('#product_name').val('');
                    $('#product_calory').val('');
                    $('#product_protein').val('');
                    $('#product_Ca').val('');
                    $('#product_K').val('');
                    $('#product_Mg').val('');
                    $('#product_Na').val('');
                    $('#product_carbohydrates').val('');
                    $('#product_fat').val('');
                    $('#product_category').val('');
                })
                .fail(function () {
                    toastr.error('Wystąpił błąd');
                });
        }

                    
    });
        
</script>
@endsection