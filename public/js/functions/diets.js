/// Data Picker ///
$('#range_data').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    container: '#range_data'
    
});
$('#range_data_edit').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    container: '#range_data_edit'
    
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
        //console.log(msg);
        console.log(msg.id);

        $('#dietTitleEdit').val(msg.title);
        $('#dateFromEdit').val(msg.dateFrom);
        $('#dateToEdit').val(msg.dateTo);
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
            console.log(msg);
            cleanInputs();
            $("#addDietModal").modal("hide");
        })
        .fail(function () {
            console.log("Wystąpił błąd");
        });
}

/// Edit Diet ///

const editDiet = (id) => {
    var title = $('#dietTitleEdit').val();
    var dateFrom = $('#dateFromEdit').val();
    var dateTo = $('#dateToEdit').val();

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
            console.log(msg);
            cleanInputs();
            $("#addDietModal").modal("hide");
        })
        .fail(function () {
            console.log("Wystąpił błąd");
        });
}