function validateResetPWForm() {
    var formName = "resetPWForm";
    
    var password = document.forms[formName]["password"].value;
    var confirmpassword = document.forms[formName]["passwordconfirm"].value;
    
    var passwordReason;
    var passwordConfirmReason;
    
    if(password == "") {
        passwordReason = "Password field cannot be empty";
    } else {
        if (!/([A-Z])/.test(password)) {
            passwordReason = "Password needs to contain at least one uppercase letter";
        } else if (!/([\d])/.test(password)) {
            passwordReason = "Password needs to contain at least one digit";
        } else if (!/([\W])/.test(password)) {
            passwordReason = "Password needs to contain at least one special character";
        } else if (password.length < 8) {
            passwordReason = "Password is too short";
        }
    }
    
    if(confirmpassword == "") {
        passwordConfirmReason = "Confirm password field cannot be empty";
    } else if(confirmpassword != password) {
        passwordConfirmReason = "Passwords do not match";
    }
    
    //if(nameReason == undefined && emailReason == undefined && passwordReason == undefined && passwordConfirmReason == undefined) {
    if(passwordReason == undefined && passwordConfirmReason == undefined) {    
        return true;
        
    } else {
        
        var passwordError = $("form[name='"+formName+"'] .passwordError");
        
        if(passwordReason != undefined) {
            passwordError.text(passwordReason);
            passwordError.css("display", "block");
            passwordError.next().css("border-color", ioRed);
        } else {
            passwordError.css("display", "none");
            passwordError.next().css("border-color", blueDark);
        }
        
        var passwordConfirmError = $("form[name='"+formName+"'] .passwordConfirmError");
        
        if(passwordConfirmReason != undefined) {
            passwordConfirmError.text(passwordConfirmReason);
            passwordConfirmError.css("display", "block");
            passwordConfirmError.next().css("border-color", ioRed);
        } else {
            passwordConfirmError.css("display", "none");
            passwordConfirmError.next().css("border-color", blueDark);
        }
        
        return false;
    }
    
    return false;
}

$("#resetPWForm").submit(function(event) {
    if (!grecaptcha.getResponse()) {
        event.preventDefault(); //prevent form submit
        grecaptcha.execute();
    } else {
        $("form[name='resetPWForm']")[0].submit();
    }
});

onCompleted = function() {
    $("form[name='resetPWForm']")[0].submit();
}