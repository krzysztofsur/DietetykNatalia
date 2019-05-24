function delete_blog(id_blog) {
    var res = confirm('Czy napewno chcesz usunąć?');
    if(res) {
        $.ajax({
            method: "DELETE",
            url: "recipes/"+id_blog,
        })
        .done(function( msg ) {
            toastr.success('Zostało usunięte');
            //show_products();
        })
        .fail(function() {
            toastr.error('Wystąpił błąd');
        });
    }
}