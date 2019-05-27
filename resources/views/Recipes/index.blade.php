@extends('layouts._LayoutPanel')
<?php $activeMainMenu = 'blog'; ?>
@section('title','Blog Add')
@section('styles')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=fqnmeurrl0ry206hcbd9m1dnhcflolt0mbr4u4ye7rvw11gc">
</script>
<script>
    tinymce.init({ selector:'textarea' });
</script>
@endsection

@section('main')

<div class="row">
    <div class="col-5">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <td>Tytuł</td>
                    <td>Data</td>
                    <td></td>
                </tr>
            </thead>
            <tbody id="blog_list">
                @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->title}}</td>
                    <td>{{ date('Y-m-d', strtotime($recipe->updated_at))}}</td>
                    <td>
                        <button class="btn btn-outline-info btn-sm" onclick="edit_blog({{ $recipe->id}})">Edit</button>
                        <button class="btn btn-outline-warning btn-sm"
                            onclick="delete_blog({{ $recipe->id}})">Usuń</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $recipes->links() }}
    </div>
    <div class="col-6" id="input_blog">

            <div class="row">
                <label for="title">Tytuł</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="row">
                <label for="title">Kategoria</label>
                <select class="form-control" id="category">
                    <option value="Przepisy">Przepisy</option>
                    <option value="Cielawostki">Ciekawostki</option>
                </select>
            </div>
            <div class="row">
                <label for="short">Short</label>
                <textarea id="short" style="width:100%"></textarea>
            </div>
            <div class="row">
                <label for="description">Treść</label>
                <textarea id="description" style="width:100%"></textarea>
            </div>
            <div class="row">
                Dodaj zdjęcie o wielkości(www na eee)<input type="file" name='file' id="imgs">
                <img src="" id="imgs_file">
            </div>
            <div class="row">
                <input type="hidden" name="id" id="id_blog">
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <button id="add_post">Zapisz</button>
                <button id="test" onclick="show_products()">test</button>
            </div>

    </div>
</div>

@endsection

@section('script')
<script>
    //show_products();
    $(document).ready(function(){


        $("#id_blog").val(0);


                    $('#add_post').on('click', function() {
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
                            })
                            .fail(function() {
                                toastr.error('Wystąpił błąd');
                            });
                        }else{
                            var vidFileLength = $("#imgs")[0].files.length;
                            if(vidFileLength === 0){
                                var change = false;
                                var property = $("#imgs_file").attr("src");
                                property= property.replace("../","../../../");
                            }else{
                                var change = true;
                                var property = document.getElementById('imgs').files[0];
                            };
                            form_data.append("file",property);
                            form_data.append("id",id);
                            form_data.append("change",change);
                            $.ajax({
                                method: "POST",
                                url: "./db/blog/blogEdit.php",
                                data: form_data,
                                contentType:false,
                                cache:false,
                                processData:false,
                            })
                            .done(function( msg ) {

                            })
                            .fail(function() {
                                toastr.error('Wystąpił błąd');
                            }); 
                        };
                    });



                    function edit_blog(id_blog) {
                        $.ajax({
                            method: "POST",
                            url: "./db/blog/blogGetData.php",
                            data: { id: id_blog}
                        })
                        .done(function( msg ) {
                            $('#title').val(msg.title);
                            $('#id_blog').val(msg.id_blog);
                            $('#category').val(msg.category);
                            let str = msg.photo;
                            str = str.replace("../../../", "../" );
                            $('#imgs_file').attr("src", str);
                            tinymce.get("short").execCommand('mceSetContent', false, msg.short);
                            tinymce.get("description").execCommand('mceSetContent', false, msg.description);
                        })
                        .fail(function() {
                            toastr.error('Wystąpił błąd');
                        });
                    }
        
                    function show_products() {
                        $.ajax({
                            method: "GET",
                            url: "./db/blog/blogGet.php",
                            dataType: "script"
                        })
                            .done(function (msg) {
                                var tab = $.parseJSON(msg);
        
                                $('#blog_list').html("");
                                for (let i = 0; i < tab.length; i++) {
                                    $('#blog_list').append('<tr><td>'+tab[i].title+'</td><td>'+tab[i].date+'</td><td><button class="btn btn-outline-info btn-sm" onclick="edit_blog('+tab[i].id_blog+')">Edit</button><button class="btn btn-outline-warning btn-sm" onclick="delete_blog('+tab[i].id_blog+')">Usuń</button></td></tr>');
                                }
                                
                            })
                            .fail(function () {
                                toastr.error('Wystąpił błąd');
                            });
                    }
                });
        
</script>
@endsection