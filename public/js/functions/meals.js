/// Select ///
const selectMeal = () =>{
    $.ajax({
        method: "GET",
        url: "/meal/"+$("#meals").val()[0],
    })
    .done(function (msg) {
        $('#mealId').val(msg.id);
        $('#mealName').val(msg.name);
        if(msg.recipe==null){
            tinymce.get("mealRecipe").execCommand('mceSetContent', false, "");
        }else{
            tinymce.get("mealRecipe").execCommand('mceSetContent', false, msg.recipe);
        }
        showIngredient($("#meals").val()[0]);
        $("#products").show();
    })
    .fail(function () {
        toastr.error('Wystąpił błąd');
    });
}

/// New/Add Meal ///
const newMeal = () => {
    var form_data = new FormData();
    var name = $("#mealName").val();
    form_data.append("_token",$("#_token").val());
    form_data.append("name",name);
    $.ajax({
            method: "POST",
            url: "/meal",
            data: form_data,
            contentType:false,
            cache:false,
            processData:false,
        })
        .done(function (msg) {
            $("#products").show();
            $("#mealId").val(msg);
            $("#productsTable tbody").html("");
            tinymce.get("mealRecipe").execCommand('mceSetContent', false, "");
        })
        .fail(function () {
            console.log("Wystąpił błąd");
        });
}

/// edit meal ///
const editMeal = () =>{
    var form_data = new FormData();
    var name = $("#mealName").val();
    form_data.append("_token",$("#_token").val());
    form_data.append("name",name);
    form_data.append("_method",'PUT');
    form_data.append("mealRecipe",tinyMCE.get('mealRecipe').getContent());
    $.ajax({
        method: "POST",
        url: "/meal/"+$("#mealId").val(),
        data: form_data,
        contentType:false,
        cache:false,
        processData:false,
    })
    .done(function (msg) {
        $("#products").show();
        $("#mealId").val(msg);
        $("#productsTable tbody").html("");
        refreshList();
    })
    .fail(function () {
        console.log("Wystąpił błąd");
    });
}

$("#mealId").val(4);

/// Show ingredients list ///
const showIngredient= (id) =>{
    $.ajax({
        method: "GET",
        url: "meal/showIngredient/"+id,
    })
    .done(function (msg) {
        $("#productsTable tbody").html("");
        msg.forEach(element => {
            $('#productsTable tbody').append('<tr>\
            <td>' + element.name + '</td>\
            <td>' +element.weight + '</td>\
            <td>'+element.unit+'</td>\
            <td><button type="button" class="btn btn-primary" data-toggle="modal" onclick="selectIngredient('+element.id+')" data-target="#IngredientModal">Edytuj</button></td>\
            </tr>');
        });
    })
    .fail(function () {
        toastr.error('Wystąpił błąd');
    });
}

/// Add ingredient ///
const addIngredient= ()=>{
    var form_data = new FormData();
    var productId = $("#product").val()[0];
    form_data.append("_token",$("#_token").val());
    form_data.append("productId",productId);
    form_data.append("weight",$("#productWeight").val());
    form_data.append("mealId",$("#mealId").val());

    $.ajax({
            method: "POST",
            url: "/meal/addIngredient",
            data: form_data,
            contentType:false,
            cache:false,
            processData:false,
        })
        .done(function (msg) {
            
            $("#product").val("")[0];
            $("#productWeight").val("")
            $("#product_search_category").val(0)
            $("#product_search").val("")
            $("#IngredientModal").modal("hide");
            showIngredient($("#mealId").val());
        })
        .fail(function () {
            console.log("Wystąpił błąd");
        });
}

function refreshProductList(){
    var form_data = new FormData();
    var query = $("#product_search").val();
    var query_cat = $("#product_search_category").val();
    form_data.append("_token",$("#_token").val());
    form_data.append("query",query);
    form_data.append("query_cat",query_cat);
    $.ajax({
        method: "POST",
        url: "/products/search",
        data: form_data,
        contentType:false,
        cache:false,
        processData:false,
        })
            .done(function (msg) {
                $('#product').html("");
                msg.products.forEach(element => {
                    $('#product').append('<option value="' + element.id + '">' +element.name + '</option>');
                });
            })
            .fail(function (msg) {

        });   
}

/// Refresh list meal ///
const refreshList = () =>{
    var form_data = new FormData();
    var query = $("#meal_search").val();
    form_data.append("_token",$("#_token").val());
    form_data.append("query",query);
    $.ajax({
        method: "POST",
        url: "/meal/search",
        data: form_data,
        contentType:false,
        cache:false,
        processData:false,
        })
            .done(function (msg) {
                $('#meals').html("");
                msg.meals.forEach(element => {
                    $('#meals').append('<option value="' + element.id + '">' +element.name + '</option>');
                });
            })
            .fail(function (msg) {
        });   
}

/// Delete meal ///
const deleteMeal= () =>{
    var _token = $("#_token").val();
    var data={
        url: "/meal/"+$("#mealId").val(),
        data: {
            "_token": _token,
            "id": $("#mealId").val()
        },
        ifDone: function() { refreshList()},
    };
    ajax_delete(data);  
}

/// Delete ingredient ///
const deleteIngredient = (id) =>{
    var _token = $("#_token").val();
    var data={
        url: window.location.href+"/deleteIngredient/"+id,
        data: {
            "_token": _token,
            "id": id
        },
        ifDone: function() {  
            showIngredient($("#mealId").val());
            $("#IngredientModal").modal("hide");
        },
    };
    ajax_delete(data);  
}

/// edit ingredient ///
const editIngredient =(id) =>{
    var form_data = new FormData();
    var productId = $("#product").val()[0];
    form_data.append("_token",$("#_token").val());
    form_data.append("productId",productId);
    form_data.append("weight",$("#productWeight").val());
    form_data.append("_method",'PUT');

    $.ajax({
            method: "POST",
            url: window.location.href+"/editIngredient/"+id,
            data: form_data,
            contentType:false,
            cache:false,
            processData:false,
        })
        .done(function (msg) {
            $("#IngredientModal").modal("hide");
            showIngredient($("#mealId").val());
        })
        .fail(function () {
            console.log("Wystąpił błąd");
        });
}

/// Select ingredient ///
const selectIngredient =(id) =>{
    $.ajax({
        method: "GET",
        url: window.location.href+"/selectIngredient/"+id,
    })
    .done(function (msg) {
        $("#productWeight").val(msg.weight);
        $("#product_search").val(msg.name)
        $('#IngredientModal .modal-footer').html('\
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>\
            <button type="button" class="btn btn-primary" onclick="deleteIngredient('+id+')">Usuń</button>\
            <button type="button" class="btn btn-primary" onclick="editIngredient('+id+')">Zapisz</button>\
        ')
        refreshProductList()

    })
    .fail(function () {
        toastr.error('Wystąpił błąd');
    });
}

const modalAdd =()=>{
    $('#IngredientModal .modal-footer').html('\
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>\
            <button type="button" class="btn btn-primary" onclick="addIngredient()">Zapisz</button>\
    ')
} 