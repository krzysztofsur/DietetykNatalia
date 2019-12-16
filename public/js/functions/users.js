// create user //
function SubmitCreate(){
    var fname = $("#fname").val(),
        lname = $("#lname").val(),
        email = $("#email").val(),
        password = $("#password").val(),
        token = $("#_token").val();

        var form_data = new FormData();
            form_data.append("fname",fname);
            form_data.append("lname",lname);
            form_data.append("password",password);
            form_data.append("email",email);
            form_data.append("_token",token);
    $.ajax({
        method: "POST",
        url: "/createUser",
        data: form_data,
        contentType:false,
        cache:false,
        processData:false,
        })
        .done(function( msg ) {
            console.log(msg);
            //window.location.href='/UserRequest'
            //toastr.success('Zostało usunięte');

        })
        .fail(function( msg) {
            toastr.error('Wystąpił błąd');
        });
};



// delete request //
function deleteRequest(id){
    var _token = $("#_token").val();
    var data={
        url: "/userRequest/"+id,
        data: {
            "_token": _token,
            "id": id
        },
        ifDone: function() { window.location.href='/userRequest'},
    };
    ajax_delete(data);

}