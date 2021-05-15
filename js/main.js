$(document).ready(function(){
    $('#dinamicDiv').load('../html/offerte.html');
    //Input che fanno uso dell'API Datepicker
    $('#dateStart').datepicker();
    $('#dateEnd').datepicker();
    $('#inputNascita').datepicker();

    //Implementazione dei Btn degli input con datepicker
    $('#calendarIconStart').click(function(){
        $('#dateStart').focus();
    });
    $('#calendarIconEnd').click(function(){
        $("#dateEnd").focus();
    });

    $('#signUpNascitaBtn').click(function(){
        $('#inputNascita').focus();
    })
    //Campo pass SignUP
    $('#showHideBtnSignUp').click(function(event) {
        if($('#inputPassSignUpModal').val().length > 1){
            event.preventDefault();
            $('#showPassIconSignUp').toggle();
            $('#hidePassIconSignUp').toggle();

            hideShowPass($('#inputPassSignUpModal'));
        }
    });
    //Campo conferma pass SignUP
    $('#showHideConfirmBtnSignUp').click(function(event) {
        if($('#inputConfirmPassSignUpModal').val().length > 1){
            event.preventDefault();
            $('#showConfirmPassIconSignUp').toggle();
            $('#hideConfirmPassIconSignUp').toggle();

            hideShowPass($('#inputConfirmPassSignUpModal'));
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
    });

    $('#inputEmailSignIn').change(function(){
        if(this.val().length > 0){
            if(this.hasClass('is-invalid')){
                this.removeClass('is-invalid');
            }
            this.addClass('is-valid');
        } else {
            if(this.hasClass('is-valid')){
                this.removeClass('is-valid');
            }
            this.addClass('is-invalid');
        }
    })

    $('#inputPassSignIn').change(function(){
        if(this.val().length > 0){
            if(this.hasClass('is-invalid')){
                this.removeClass('is-invalid');
            }
            this.addClass('is-valid');
        } else {
            if(this.hasClass('is-valid')){
                this.removeClass('is-valid');
            }
            this.addClass('is-invalid');
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
