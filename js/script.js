//event pada saat link di klik
$('.page-scroll').on('click', function (e) {
    var tujuan = $(this).attr('href');

    var elemenTujuan = $(tujuan);

    $('body').animate({
        scrollTop: elemenTujuan.offset().top
    });


});