$(function () {
    skinChanger();
    activateNotificationAndTasksScroll();

    setSkinListHeightAndScroll(true);
    setSettingListHeightAndScroll(true);
    $(window).resize(function () {
        setSkinListHeightAndScroll(false);
        setSettingListHeightAndScroll(false);
    });
});

//Skin changer
function skinChanger() {
    $('.right-sidebar .demo-choose-skin li').on('click', function () {
        var $body = $('body');
        var $this = $(this);

        var existTheme = $('.right-sidebar .demo-choose-skin li.active').data('theme');
        $('.right-sidebar .demo-choose-skin li').removeClass('active');
        $body.removeClass('theme-' + existTheme);
        $this.addClass('active');

        $body.addClass('theme-' + $this.data('theme'));
    });
}

//Skin tab content set height and show scroll
function setSkinListHeightAndScroll(isFirstTime) {
    var height = $(window).height() - ($('.navbar').innerHeight() + $('.right-sidebar .nav-tabs').outerHeight());
    var $el = $('.demo-choose-skin');

    if (!isFirstTime){
      $el.slimScroll({ destroy: true }).height('auto');
      $el.parent().find('.slimScrollBar, .slimScrollRail').remove();
    }

    $el.slimscroll({
        height: height + 'px',
        color: 'rgba(0,0,0,0.5)',
        size: '6px',
        alwaysVisible: false,
        borderRadius: '0',
        railBorderRadius: '0'
    });
}

//Setting tab content set height and show scroll
function setSettingListHeightAndScroll(isFirstTime) {
    var height = $(window).height() - ($('.navbar').innerHeight() + $('.right-sidebar .nav-tabs').outerHeight());
    var $el = $('.right-sidebar .demo-settings');

    if (!isFirstTime){
      $el.slimScroll({ destroy: true }).height('auto');
      $el.parent().find('.slimScrollBar, .slimScrollRail').remove();
    }

    $el.slimscroll({
        height: height + 'px',
        color: 'rgba(0,0,0,0.5)',
        size: '6px',
        alwaysVisible: false,
        borderRadius: '0',
        railBorderRadius: '0'
    });
}

//Activate notification and task dropdown on top right menu
function activateNotificationAndTasksScroll() {
    $('.navbar-right .dropdown-menu .body .menu').slimscroll({
        height: '254px',
        color: 'rgba(0,0,0,0.5)',
        size: '4px',
        alwaysVisible: false,
        borderRadius: '0',
        railBorderRadius: '0'
    });
}



/// show blog list ///
function show_products() {
    $.ajax({
        method: "GET",
        url: "/recipes/create",
        
    })
        .done(function (msg) {
            var tab = msg.recipes.data;
            //console.log(msg.recipes.data)
            $('#blog_list').html("");
            for (let i = 0; i < tab.length; i++) {
                var tmp = tab[i].updated_at.split(' ')
                $('#blog_list').append('<tr><td>'+tab[i].title+'</td><td>'+tmp[0]+'</td><td><button class="btn btn-outline-info btn-sm blogedit" id="'+tab[i].id+'">Edit</button><button class="btn btn-outline-warning btn-sm blogdelete" id="'+tab[i].id+'">Usuń</button></td></tr>');
            }
        })
        .fail(function () {
            toastr.error('Wystąpił błąd');
        });
}
/// end show blog list ///

/// menu add active class ///
var patch = window.location.pathname.split("/").pop();
var target = $('li a[href="/'+patch+'"]');
target.parent().addClass('active');    
if(target.parent().parent().hasClass("ml-menu")){
    target.parent().parent().parent().addClass('active');
}
/// end menu add active class ///

