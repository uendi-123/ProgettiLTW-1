$(document).ready(function(){
    $('#dinamicDiv').load('../html/offerte.html');
    
    $('.normalCard').click(function(){
        $('.normalCard').removeClass('activeCard');
        $(this).addClass('activeCard');

        $('.normalCard').children('span').removeClass('activeSpanCard');
        $(this).children('span').addClass('activeSpanCard');

        if($(this).attr('id') === 'offerteDiv'){
            $('#dinamicDiv').load('../html/offerte.html');
        }
    })
})