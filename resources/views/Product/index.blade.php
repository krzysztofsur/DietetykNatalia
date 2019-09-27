@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Produkty')
@section('styles')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=fqnmeurrl0ry206hcbd9m1dnhcflolt0mbr4u4ye7rvw11gc">
</script>
<script>
    tinymce.init({ selector:'textarea' });
</script>
@endsection

@section('main')


<div class="row">
    <div class="col-lg-3">
        <label for="product">Lista produktów</label>
        <!--<input type="text" id="product_search" oninput="search_product()" placeholder="Szukaj...">-->
        <select multiple class="form-control" id="product" onchange="product_select()">
            @foreach ($products as $product)
            <option value="{{ $product->id}}">{{ $product->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-9">
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

            <div class="col-lg-3">
                <label for="product_bl">Białka</label>
                <input type="number" class="form-control" id="product_protein" value="0">
            </div>
            <div class="col-lg-3">
                <label for="product_wegle">Węglowodany</label>
                <input type="number" class="form-control" id="product_carbohydrates" value="0">
            </div>
            <div class="col-lg-3">
                <label for="product_fats">Tłuszcze</label>
                <input type="number" class="form-control" id="product_fats" value="0">
            </div>
            <div class="col-lg-3">
                <label for="product_calories">Kalorie</label>
                <input type="number" class="form-control" id="product_calories" value="0">
            </div>

            <div class="col-lg-3">
                <label for="product_Ca">Ca</label>
                <input type="number" class="form-control" id="product_Ca" value="0">
            </div>
            <div class="col-lg-3">
                <label for="product_K">K</label>
                <input type="number" class="form-control" id="product_K" value="0">
            </div>
            <div class="col-lg-3">
                <label for="product_Fe">Fe</label>
                <input type="number" class="form-control" id="product_Fe" value="0">
            </div>
            <div class="col-lg-3">
                <label for="product_Na">Na</label>
                <input type="number" class="form-control" id="product_Na" value="0">
            </div>

            <div class="col-lg-3">
                <label for="product_blonnik">Błonnik</label>
                <input type="number" class="form-control" id="product_blonnik" value="0">
            </div>
            <div class="col-lg-3">
                <label for="product_vitamin_c">Witamina C</label>
                <input type="number" class="form-control" id="product_vitamin_c" value="0">
            </div>
            <div class="col-lg-3">
                <label for="product_kwasy_nasycone">Kwasy nasycone</label>
                <input type="number" class="form-control" id="product_kwasy_nasycone" value="0">
            </div>
            <div class="col-lg-3">
                <label for="product_kwasy_nienasycone">Kwasy nienasycone</label>
                <input type="number" class="form-control" id="product_kwasy_nienasycone" value="0">
            </div>

            <div class="col-lg-3">
                <label for="product_cholesterol">cholesterol</label>
                <input type="number" class="form-control" id="product_cholesterol" value="0">
            </div>
            <div class="col-lg-3">
                <label for="product_vitamin_b12">Witamina B12</label>
                <input type="number" class="form-control" id="product_vitamin_b12" value="0">
            </div>

        </div>

        <div class="row">
            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" id="id_product">
            <button type="button" class="btn btn-success" id="add_product">Zapisz</button>
            <button class="btn btn-danger" onclick="product_Delete()">Usuń</button>
            <!--<button class="btn btn-success" onclick="location.href='./product_category.php'">Kategorie</button>-->
        </div>
    </div>
</div>


@endsection

@section('script')
<script>

function show_product_list() {
    $.ajax({
    method: "GET",
    url: "products/create",
    })
        .done(function (msg) {
            var tab = msg.products;
            $('#product').html("");
            for (let i = 0; i < tab.length; i++) {
                $('#product').append('<option value="' + tab[i].id + '">' + tab[i].name + '</option>');
            }
            $('#id_product').val(0);
            $('#product_name').val('');
            $('#product_calories').val(0);
            $('#product_protein').val(0);
            $('#product_Ca').val(0);
            $('#product_K').val(0);
            $('#product_Fe').val(0);
            $('#product_Na').val(0);
            $('#product_carbohydrates').val(0);
            $('#product_fats').val(0);
            $('#product_category').val(1);
            $('#product_vitamin_b12').val(0);
            $('#product_cholesterol').val(0);
            $('#product_kwasy_nienasycone').val(0);
            $('#product_kwasy_nasycone').val(0);
            $('#product_vitamin_c').val(0);
            $('#product_blonnik').val(0);
        })
        .fail(function () {
            toastr.error('Wystąpił błąd');
        });
    }
show_product_list();

function product_Delete() {
    var res = confirm('Czy napewno chcesz usunąć?');
    if(res) {
        var id = $("#id_product").val();
        $.ajax({
            method: "DELETE",
            url: "products/"+id,
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            }
        })
            .done(function (msg) {
                show_product_list()
            })
            .fail(function () {
                toastr.error('Wystąpił błąd');
            });
    }
}

function product_select() {

$.ajax({
    method: "GET",
    url: "products/"+$("#product").val()[0],
})
    .done(function (msg) {
        console.log('dziala');
        $('#id_product').val(msg.id);
        $('#product_name').val(msg.name);
        $('#product_calories').val(msg.calories);
        $('#product_protein').val(msg.protein);
        $('#product_Ca').val(msg.ca);
        $('#product_K').val(msg.k);
        $('#product_Fe').val(msg.fe);
        $('#product_Na').val(msg.na);
        $('#product_carbohydrates').val(msg.carbohydrates);
        $('#product_fats').val(msg.fats);
        $('#product_category').val(msg.categories_id);
        $('#product_vitamin_b12').val(msg.vitamin_b12);
        $('#product_cholesterol').val(msg.cholesterol);
        $('#product_kwasy_nienasycone').val(msg.kwasy_nienasycone);
        $('#product_kwasy_nasycone').val(msg.kwasy_nasycone);
        $('#product_vitamin_c').val(msg.vitamin_c);
        $('#product_blonnik').val(msg.blonnik);

    })
    .fail(function () {
        toastr.error('Wystąpił błąd');
    });
}


    $(document).ready(function(){

        $('#add_product').on('click', function(e) {
            e.preventDefault();
            var id=$('#id_product').val(),
            _token = $('#_token').val(),
            name = $('#product_name').val(),
            calory = $('#product_calories').val(),
            protein = $('#product_protein').val(),
            ca = $('#product_Ca').val(),
            k = $('#product_K').val(),
            fe = $('#product_Fe').val(),
            na = $('#product_Na').val(),
            carbohydrates = $('#product_carbohydrates').val(),
            fats = $('#product_fats').val(),
            category=$('#product_category').val(),
            vitamin_b12 = $('#product_vitamin_b12').val(),
            cholesterol = $('#product_cholesterol').val(),
            kwasy_nienasycone = $('#product_kwasy_nienasycone').val(),
            kwasy_nasycone = $('#product_kwasy_nasycone').val(),
            vitamin_c = $('#product_vitamin_c').val(),
            blonnik = $('#product_blonnik').val();

            var form_data = new FormData();
            form_data.append("category",category);
            form_data.append("name",name);
            form_data.append("_token",_token);
            form_data.append("calory", calory);
            form_data.append("protein", protein);
            form_data.append("ca",ca);
            form_data.append("k",k);
            form_data.append("fe",fe);
            form_data.append("na",na);
            form_data.append("carbohydrates",carbohydrates);
            form_data.append("fats",fats);
            form_data.append("vitamin_b12",vitamin_b12);
            form_data.append("cholesterol",cholesterol);
            form_data.append("kwasy_nienasycone",kwasy_nienasycone);
            form_data.append("kwasy_nasycone",kwasy_nasycone);
            form_data.append("vitamin_c",vitamin_c);
            form_data.append("blonnik",blonnik);
            form_data.append("unit",'test');

            if(id==0){
                $.ajax({
                    method: "POST",
                    url: "/products",
                    data: form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                })
                .done(function( msg ) {
                    console.log(msg);
                    toastr.success('Produkt został dodany');
                    show_product_list();
                })
                .fail(function() {
                    toastr.error('Uzupełnij wszystkie pola');
                });
            }else{
                console.log(id+" edit");

                form_data.append("id",id);
                form_data.append("_method",'PUT');
                $.ajax({
                    method: "POST",
                    url: "/products/"+id,
                    data: form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                })
                .done(function( msg ) {
                    console.log(msg)
                    toastr.success('Produkt został zaktualizowany');
                    show_product_list();
                })
                .fail(function() {
                    toastr.error('Wystąpił błąd');
                }); 
            };
        });
        
        

    });
        
</script>
@endsection