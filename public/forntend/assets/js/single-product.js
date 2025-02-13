$(document).ready(function (){
    $(".color-name").on('change', function () {
        var id = $(this).data('id');
        var name = $(this).find('.js-variant-selector').attr('data-title');
        var pallete = $(this).find('.js-variant-selector').attr('data-pallete');
        console.log(pallete)
        $(".js-color-title").text(name)
        $(".js-color-pallete").css('backgroundColor' , pallete);
    });
});
