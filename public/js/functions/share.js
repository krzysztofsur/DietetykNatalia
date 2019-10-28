/// delete pattern ///
function ajax_delete(data) {
    var res = confirm("Czy napewno chcesz usunąć?");
    if(res) {
        $.ajax({
            method: "DELETE",
            url: data.url,
            data: data.data
        })
            .done(function (msg) {
                console.log("Zostało usunięte")
                data.ifDone();
            })
            .fail(function () {
                console.log("Wystąpił błąd")
            });
    }else {
        return false;
    }
}


// var arrNumber = new Array();
// $('input[type=number]').each(function(){
//     arrNumber.push($(this).val());
// })