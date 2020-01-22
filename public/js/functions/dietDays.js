/// Refresh list meal ///
const refreshMealList = () =>{
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
const getUrl= ()=>{
    var userId= $('#idUser').val();
    var dietId= $('#idDiet').val();
    return '/userList/'+userId+'/diet/'+dietId+'/dietDays'
}

/// Add meal to DietDays ///
const addDietDays = (tableId) => {
    var url=getUrl();
    var form_data = new FormData();
    var meal = $("#meals").val()[0];
    var id=$('#idDietD').val()
    form_data.append("_token",$("#_token").val());
    form_data.append("id_meal",meal);
    form_data.append("id_table",tableId);
    form_data.append("_method",'PUT');
    form_data.append("id",id);

    console.log(meal);
    console.log(tableId);
    console.log(id);
    $.ajax({
            method: "POST",
            url: url+'/'+id,
            data: form_data,
            contentType:false,
            cache:false,
            processData:false,
        })
        .done(function (msg) {
            console.log("działa");
            console.log(msg)
            //$("#products").show();
            $("#idetDModal").modal("hide");

        })
        .fail(function () {
            console.log("Wystąpił błąd");
        });
}

/// modal add ///
const modalAdd=(tableId)=>{
    $("#dietDModal .modal-footer").html('\
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>\
        <button type="button" class="btn btn-primary" onclick="addDietDays('+tableId+')">Zapisz</button>\
    ')
}

/// delete ///
const deleteDietDayMeal=(i,j)=>{
    console.log("i="+i+" j= "+j)
    var id = $("#idDietD").val();
    var _token = $("#_token").val();

    var data={
        url: getUrl()+"/"+id,
        data: {
            "_token": _token,
            "id": id,
            "i":i,
            "j":j
        },
        ifDone: function() { 
            console.log(msg)
        },
    };
    ajax_delete(data);
}