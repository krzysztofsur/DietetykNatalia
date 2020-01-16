/// Data Picker ///
$('#range_data').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    container: '#range_data'
    
});

/// Clean input ///
const cleanInputs= () =>{
    $("#dietTitle").val("");
    $("#range_data").datepicker("clearDates");
    $("#dietTitleEdit").val("");
    $("#range_dataEdit").datepicker("clearDates");
}

/// Select Diet ///
const selectDiet = (id) =>{
    console.log(id);
    $.ajax({
        method: "GET",
        url: window.location.href+'/select/'+id,
    })
    .done(function (msg) {
        console.log(msg.id);

        $('#dietTitle').val(msg.title);
        $('#dateFrom').val(msg.dateFrom);
        $('#dateTo').val(msg.dateTo);
        $("#DietModal .modal-footer").html('\
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>\
            <button type="button" class="btn btn-primary" onclick="editDiet('+id+')">Zapisz zmiany</button>\
            <button type="button" class="btn btn-primary" onclick="deleteDiet('+ id +')">Usuń</button>\
        ')
    })
    .fail(function () {
        toastr.error('Wystąpił błąd');
    });
}

/// Add Diet ///
const addDiet = () => {
    var title = $('#dietTitle').val();
    var dateFrom = $('#dateFrom').val();
    var dateTo = $('#dateTo').val();

    var form_data = new FormData();
    form_data.append("_token",$("#_token").val());
    form_data.append("title",title);
    form_data.append("dateFrom",dateFrom);
    form_data.append("dateTo",dateTo);
    $.ajax({
            method: "POST",
            url: window.location.href,
            data: form_data,
            contentType:false,
            cache:false,
            processData:false,
        })
        .done(function (msg) {
            cleanInputs();
            refreshList()
            $("#DietModal").modal("hide");
        })
        .fail(function () {
            console.log("Wystąpił błąd");
        });
}

/// Edit Diet ///
const editDiet = (id) => {
    var title = $('#dietTitle').val();
    var dateFrom = $('#dateFrom').val();
    var dateTo = $('#dateTo').val();

    var form_data = new FormData();
    form_data.append("_token",$("#_token").val());
    form_data.append("title",title);
    form_data.append("dateFrom",dateFrom);
    form_data.append("_method",'PUT');
    form_data.append("dateTo",dateTo);
    $.ajax({
            method: "POST",
            url: window.location.href+'/'+id,
            data: form_data,
            contentType:false,
            cache:false,
            processData:false,
        })
        .done(function (msg) {
            refreshList();
            cleanInputs();
            $("#DietModal").modal("hide");
        })
        .fail(function () {
            console.log("Wystąpił błąd");
        });
}

/// Add modal ///
const addModal =()=>{
    $("#DietModal .modal-footer").html('\
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>\
        <button type="button" class="btn btn-primary" onclick="addDiet()">Zapisz zmiany</button>\
    ');
    cleanInputs();
}

/// Delete meal ///
const deleteDiet= (id) =>{
    var _token = $("#_token").val();
    var data={
        url: window.location.href+'/'+id,
        data: {
            "_token": _token,
            "id": id
        },
        ifDone: function() { 
            cleanInputs();
            $("#DietModal").modal("hide");
            refreshList()
        },
    };
    ajax_delete(data);  
}
const refreshList=()=> {
    $.ajax({
        method: "get",
        url: window.location.href+'/create',
        
    })
        .done(function (msg) {
            $('#diet_list').html("");
            
            msg.diets.data.forEach(element => {
                $('#diet_list').append('<tr>\
                    <td>'+element.title+'</td>\
                    <td>'+element.dateFrom+'</td>\
                    <td>'+element.dateTo+'</td>\
                    <td>\
                    <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#DietModal" onclick="selectDiet('+element.id +')">Edit</button>\
                </td>\
                <td>\
                    <a class="btn btn-outline-info btn-sm" href="'+window.location.href+'/'+element.id+"/dietDays"+'">Szczegóły</a>\
                </td>\
                </tr>');
            });
        })
        .fail(function () {
            toastr.error('Wystąpił błąd');
        });
}