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

/// Show ingredient ///
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
            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editIngredientModal">Edytuj</button></td>\
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
    console.log(productId);
    console.log($("#mealId").val());
    console.log($("#productWeight").val());

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
            $("#addIngredientModal").modal("hide");
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

/// Refresh list ///
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
function deleteMeal() {
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
};
function deleteIngredient(id) {
    var _token = $("#_token").val();
    var data={
        url: "/deleteIngredient",
        data: {
            "_token": _token,
            "id": id
        },
        ifDone: function() { refreshList()},
    };
    ajax_delete(data);  
};