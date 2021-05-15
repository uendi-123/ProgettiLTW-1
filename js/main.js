$(document).ready(function(){
    $('#dinamicDiv').load('../html/offerte.html');
    // Calendario Data Inizio
    $('#calendarIconStart').click(function(){
        dateInput(this.parent('div').parent('div').children('input'));
    });
    //Calendario Data Fine
    $("#dateEnd").datepicker({ dateFormat: 'dd-mm-yy' });
    $('#calendarIconEnd').click(function(){
        $("#dateEnd").focus();
    });

    $('#inputNascita').datepicker();
    $('#signUpNascitaBtn').click(function(){
        $('#inputNascita').focus();
    })

    $('#showHideBtnSignUp').click(function(event) {
        if($('#inputPassSignUpModal').val().length > 1){
            event.preventDefault();
            $('#showPassIconSignUp').toggle();
            $('#hidePassIconSignUp').toggle();

            hideShowPass($('#inputPassSignUpModal'));
        }
    });
    $('#showHideBtnSignIn').click(function(event) {
        if($('#inputPassSignInModal').val().length > 1){
            event.preventDefault();
            $('#showPassIconSignIn').toggle();
            $('#hidePassIconSignIn').toggle();

            hideShowPass($('#inputPassSignInModal'));
        }
    });


    
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

let hideShowPass = el => {
    if (el.attr("type") == "password") {
        el.attr("type", "text");
    } else {
        el.attr("type", "password");
    }
}

let dateInput = el =>{

    btn = $(el).children('btn');

    el.datepicker();
    $(btn).click(function(){
        $(el).focus();
    })
}