function show_products() {
    $.ajax({
        method: "GET",
        url: "/recipes/create",
        
    })
        .done(function (msg) {
            var tab = msg.recipes.data;
            console.log(msg.recipes.data)
            $('#blog_list').html("");
            for (let i = 0; i < tab.length; i++) {
                var tmp = tab[i].updated_at.split(' ')
                $('#blog_list').append('<tr><td>'+tab[i].title+'</td><td>'+tmp[0]+'</td><td><button class="btn btn-outline-info btn-sm" onclick="edit_blog('+tab[i].id+')">Edit</button><button class="btn btn-outline-warning btn-sm blogdelete" id="'+tab[i].id+'">Usuń</button></td></tr>');
            }
            
        })
        .fail(function () {
            toastr.error('Wystąpił błąd');
        });
}