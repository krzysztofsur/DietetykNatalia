/// Select ///
const selectMeal = () =>{
    console.log("(^.^)");
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
            console.log(msg);
            $("#products").show();
            $("#mealId").val(msg);
            $("#productsTable tbody").html("");
        })
        .fail(function () {
            console.log("Wystąpił błąd");
        });
}

/// Show ingredients ///
const showIngredients = ()=>{
    $.ajax({
        method: "GET",
        url: "/meal/"+$("#mealId").val(),
    })
    .done(function (msg) {
        console.log(msg);
    })
    .fail(function () {
        toastr.error('Wystąpił błąd');
    });
}
$("#mealId").val(3);

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
            console.log(msg);
            //showIngredients();
            $("#productsTable tbody").html("");
            msg.forEach(element => {
                $('#productsTable tbody').append('<tr><td>' + element.name + '</td><td>' +element.weight + '</td><td>'+element.unit+'</td></tr>');
            });
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
                console.log("(^.^)");
                msg.meals.forEach(element => {
                    $('#meals').append('<option value="' + element.id + '">' +element.name + '</option>');
                });
            })
            .fail(function (msg) {
        });   
}