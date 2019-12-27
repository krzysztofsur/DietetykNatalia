/// Data Picker ///
$('#range_data').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    container: '#range_data'
    
});

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
            $("#dietTitle").val("");
            $("#range_data").datepicker("clearDates");
            $("#addDietModal").modal("hide");
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
            console.log(msg);
            $("#dietTitle").val("");
            $("#range_data").datepicker("clearDates");
            $("#addDietModal").modal("hide");
        })
        .fail(function () {
            console.log("Wystąpił błąd");
        });
}