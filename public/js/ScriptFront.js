/// menu add active class ///
var patch = window.location.pathname.split("/").pop();
if(patch == ""){
    var target = $('a[href="/"]');
}
var target = $('a[href="/'+patch+'"]');
target.addClass('active');
/// end menu add active class ///

