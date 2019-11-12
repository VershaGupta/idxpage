function validateForgotPWForm() {
    var formName = "forgotPWForm";
    
    var email = document.forms[formName]["email"].value.trim();
    var emailReason;
    
    if(email == "") {
        emailReason = "Email field cannot be empty";
    } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/.test(email)){
        emailReason = "Input valid email address";
    }
    
    if(emailReason == undefined) {
        return true;
    } else {
        
        var emailError = $("form[name='"+formName+"'] .emailError");
        
        if(emailReason != undefined) {
            emailError.text(emailReason);
            emailError.css("display", "block");
            emailError.next().css("border-color", ioRed);
        } else {
            emailError.css("display", "none");
            emailError.next().css("border-color", blueDark);
        }
        
        return false;
    }
    
    return false;
}

$("#forgotPWForm").submit(function(event) {
    if (!grecaptcha.getResponse()) {
        event.preventDefault(); //prevent form submit
        grecaptcha.execute();
    } else {
        $("form[name='forgotPWForm']")[0].submit();
    }
});
onCompleted = function() {
    $("form[name='forgotPWForm']")[0].submit();
}