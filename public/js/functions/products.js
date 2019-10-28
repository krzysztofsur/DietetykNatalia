/// show list ///
function show_product_list() {
    $.ajax({
    method: "GET",
    url: "/products/create",
    })
        .done(function (msg) {
            var tab = msg.products;
            $('#product').html("");
            for (let i = 0; i < tab.length; i++) {
                $('#product').append('<option value="' + tab[i].id + '">' + tab[i].name + '</option>');
            }
            cleanInput();
        })
        .fail(function () {
            toastr.error('Wystąpił błąd');
    });
}

/// clean Input ///
function cleanInput(){
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
}

/// delete ///
function product_Delete() {
    var id = $("#id_product").val();
    var _token = $("#_token").val();

    var data={
        url: "/products/"+id,
        data: {
            "_token": _token,
            "id": id
        },
        ifDone: function() { show_product_list()},
    };
    ajax_delete(data);
}

/// select ///
function product_select() {
    $.ajax({
        method: "GET",
        url: "/products/"+$("#product").val()[0],
    })
    .done(function (msg) {
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

/// take value and add to FormData ///
function takeInput(){
    var _token = $('#_token').val(),
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
    return form_data;
}

/// add ///
function addProduct(){
    form_data= takeInput();
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
}

/// edit ///
function editProduct(){
    form_data= takeInput();
    var id=$('#id_product').val();
    if(id==0){
        toastr.info('Wybierz produkt');
    }else{
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
    }
}

/// search ///
function searchProduct(){
    
}