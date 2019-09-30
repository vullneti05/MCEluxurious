// Show files that are uploaded on file input
$('.custom-file input').change(function(e) {
    var files = [];
    for (var i = 0; i < $(this)[0].files.length; i++) {
        files.push($(this)[0].files[i].name);
    }
    $(this).next('.custom-file-label').html(files.join(', '));
});

$(".nav-side-link").each(function() {
    if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) {
        $(this).addClass('active');
    }
});
// 
$(".navbar-toggler").click(function() {
    $(".navbar").toggleClass("bg-black");
});
//