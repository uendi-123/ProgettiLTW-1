$(document).ready(function(){
    $('.col').click(function(){
        $('.col').removeClass('activeCard');
        $('.col').children('span').removeClass('activeSpanCard');
        $(this).toggleClass('activeCard');
        $(this).children('span').toggleClass('activeSpanCard')
    })
})