$(document).ready(function(){
    $('#dinamicDiv').load('../html/offerte.html');
    
    $('.normalCard').click(function(){
        // $('.normalCard').removeClass('activeCard');
        // $(this).addClass('activeCard');

        $('.normalCard').children('span').removeClass('activeSpanCard');
        $(this).children('span').addClass('activeSpanCard');

        $('.normalCard').children('span').removeClass('activeSpanCard');

        // for(let i = 0; i < $('.normalCard').length; i++){
        //     if($('.normalCard').get(i).children('span').hasClass('fs-2') && $('.normalCard')[i] !== $(this)){
        //         $('.normalCard')[i].children('span').removeClass('fs-2');
        //         $('.normalCard')[i].children('span').addClass('fs-4');

        //         $(this).children('span').removeClass('fs-4');
        //         $(this)[i].children('span').addClass('fs-2');
        //     }
        // }
        // $(this).children('span').addClass('fs-2');

        if($(this).attr('id') === 'offerteDiv'){
            $('#dinamicDiv').load('../html/offerte.html');
        }
    })
})