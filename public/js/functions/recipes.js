// show blog list //
function showBlogList() {
    $.ajax({
        method: "GET",
        url: "/recipes/create",
        
    })
        .done(function (msg) {
            var tab = msg.recipes.data;
            $('#blog_list').html("");
            for (let i = 0; i < tab.length; i++) {
                var tmp = tab[i].updated_at.split(' ')
                $('#blog_list').append('<tr>\
                    <td>'+tab[i].title+'</td>\
                    <td>'+tmp[0]+'</td>\
                    <td>\
                        <button class="btn btn-outline-info btn-sm " onclick="blogEdit('+tab[i].id+')">Edit</button>\
                        <button class="btn btn-outline-warning btn-sm" onclick="blogDelete('+tab[i].id+')">Usuń</button>\
                    </td>\
                </tr>');
            }
        })
        .fail(function () {
            toastr.error('Wystąpił błąd');
        });
}

// Delete //
function blogDelete(id) {
    var _token = $("#_token").val();
    var data={
        url: "recipes/"+id,
        data: {
            "_token": _token,
            "id": id
        },
        ifDone: function() { showBlogList()},
    };
    ajax_delete(data);  
};

$("#id_blog").val(0);

// Add/Edit //
function addPost() {
    var id=$('#id_blog').val(),
    title = $('#title').val(),
    _token = $('#_token').val(),
    category = $('#category').val();

    var form_data = new FormData();
    form_data.append("category",category);
    form_data.append("_token",_token);
    form_data.append("short", tinyMCE.get('short').getContent());
    form_data.append("description", tinyMCE.get('description').getContent());
    form_data.append("title",title);

    if(id==0){
        var property = document.getElementById('imgs').files[0];
        form_data.append("file",property);
        $.ajax({
            method: "POST",
            url: "/recipes",
            data: form_data,
            contentType:false,
            cache:false,
            processData:false,
        })
        .done(function( msg ) {
            toastr.success('Post został dodany');
            showBlogList();
        })
        .fail(function() {
            toastr.error('Uzupełnij wszystkie pola');
        });
    }else{
        var vidFileLength = $("#imgs")[0].files.length;
        if(vidFileLength === 0){
            var change = false;
            var property = $("#imgs_file").attr("src");
            //property= property.replace("../","../../../");
        }else{
            var change = true;
            var property = document.getElementById('imgs').files[0];
        };
        form_data.append("file",property);
        form_data.append("change",change);
        form_data.append("id",id);
        form_data.append("_method",'PUT');
        $.ajax({
            method: "POST",
            url: "/recipes/"+id,
            data: form_data,
            contentType:false,
            cache:false,
            processData:false,
        })
        .done(function( msg ) {
            //console.log(msg);
            toastr.success('Post został zaktualizowany');
            showBlogList();
        })
        .fail(function() {
            toastr.error('Wystąpił błąd');
        }); 
    };
};

// Edit-select post //
function blogEdit(id) {
    $.ajax({
        method: "GET",
        url: "/recipes/"+id+"/edit",
    })
    .done(function( msg ) {
        $('#title').val(msg.title);
        $('#id_blog').val(msg.id);
        $('#category').val(msg.category);
        let str = msg.photo;
        //str = str.replace("../../../", "../" );
        $('#imgs_file').attr("src", str);
        tinymce.get("short").execCommand('mceSetContent', false, msg.short);
        tinymce.get("description").execCommand('mceSetContent', false, msg.description);
    })
    .fail(function() {
        toastr.error('Wystąpił błąd');
    });
};