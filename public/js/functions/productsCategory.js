/// take input ///
function takeInput(){
    var form_data = new FormData();
    form_data.append("name",$("#category_name").val());
    form_data.append("id",$("#id_category").val());
    form_data.append("_token",$("#_token").val());
    return form_data
}

/// clean input ///
function cleanInput(){
    $("#id_category").val(0);
    $("#category_name").val("");
}

/// add ///
function addCategory(){
    form_data = takeInput();
    $.ajax({
        method: "POST",
        url: "/addCategory",
        data: form_data,
        contentType:false,
        cache:false,
        processData:false,
    })
    .done(function( msg ) {
        console.log(msg);
        toastr.success('Produkt został dodany');
        //refreshList();
    })
    .fail(function() {
        toastr.error('Uzupełnij wszystkie pola');
    });

    console.log("(^.^)")
}

/// edit ///
function editCategory(){
    form_data = takeInput();
    if(form_data.get("id")==0){
        toastr.info('Wybierz produkt');
    }else{
        form_data.append("_method",'PUT');
        $.ajax({
            method: "POST",
            url: "/addCategory/"+form_data.get("id"),
            data: form_data,
            contentType:false,
            cache:false,
            processData:false,
        })
        .done(function( msg ) {
            console.log(msg)
            toastr.success('Produkt został zaktualizowany');
            //refreshList();
        })
        .fail(function() {
            toastr.error('Wystąpił błąd');
        });
    }
}

/// select ///
function selectCategory(){
    $.ajax({
        method: "GET",
        url: "/addCategory/"+$("#category").val()[0],
    })
    .done(function (msg) {
        $('#id_category').val(msg.id);
        $('#category_name').val(msg.name);
    })
    .fail(function () {
        toastr.error('Wystąpił błąd');
    });
}

/// delete ///
function deleteCategory(){
    var id = $("#id_category").val();
    var _token = $("#_token").val();

    var data={
        url: "/addCategory/"+id,
        data: {
            "_token": _token,
            "id": id
        },
        ifDone: function() { refreshList()},
    };
    ajax_delete(data);
}
refreshList();

/// Refresh List ///
function refreshList(){
    var form_data = new FormData();
    var query = $("#product_search").val();
    form_data.append("_token",$("#_token").val());
    form_data.append("query",query);
    //$("#product_search").val();
    $.ajax({
        method: "POST",
        url: "/addCategory/search",
        data: form_data,
        contentType:false,
        cache:false,
        processData:false,
        })
            .done(function (msg) {
                $('#category').html("");
                console.log("(^.^)");
                msg.category.forEach(element => {
                    $('#category').append('<option value="' + element.id + '">' +element.name + '</option>');
                });
                cleanInput();
            })
            .fail(function (msg) {

        });   
}

