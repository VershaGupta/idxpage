function validateSignUpForm() {
    var formName = "signupForm";
    
    //var name = document.forms[formName]["name"].value.trim();
    var email = document.forms[formName]["email"].value.trim();
    var password = document.forms[formName]["password"].value;
    //var confirmpassword = document.forms[formName]["passwordconfirm"].value;
    
    //var nameReason;
    var emailReason;
    var passwordReason;
    //var passwordConfirmReason;
    
    
    //if(name == "") {
        //nameReason = "Name field cannot be empty";   
    //}
    
    if(email == "") {
        emailReason = "Email field cannot be empty";
    } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/.test(email)){
        emailReason = "Input valid email address";
    }
    
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
    
    //if(confirmpassword == "") {
        //passwordConfirmReason = "Confirm password field cannot be empty";
    //} else if(confirmpassword != password) {
        //passwordConfirmReason = "Passwords do not match";
    //}
    
    //if(nameReason == undefined && emailReason == undefined && passwordReason == undefined && passwordConfirmReason == undefined) {
    if(emailReason == undefined && passwordReason == undefined) {    
        return true;
        
    } else {
        
        /*var nameError = $("form[name='"+formName+"'] .nameError");
        
        if(nameReason != undefined) {
            nameError.text(nameReason);
            nameError.css("display", "block");
            nameError.next().css("border-color", ioRed);
        } else {
            nameError.css("display", "none");
            nameError.next().css("border-color", blueDark);
        }*/
        
        var emailError = $("form[name='"+formName+"'] .emailError");
        
        if(emailReason != undefined) {
            emailError.text(emailReason);
            emailError.css("display", "block");
            emailError.next().css("border-color", ioRed);
        } else {
            emailError.css("display", "none");
            emailError.next().css("border-color", blueDark);
        }
        
        var passwordError = $("form[name='"+formName+"'] .passwordError");
        
        if(passwordReason != undefined) {
            passwordError.text(passwordReason);
            passwordError.css("display", "block");
            passwordError.next().css("border-color", ioRed);
        } else {
            passwordError.css("display", "none");
            passwordError.next().css("border-color", blueDark);
        }
        
        /*var passwordConfirmError = $("form[name='"+formName+"'] .passwordConfirmError");
        
        if(passwordConfirmReason != undefined) {
            passwordConfirmError.text(passwordConfirmReason);
            passwordConfirmError.css("display", "block");
            passwordConfirmError.next().css("border-color", ioRed);
        } else {
            passwordConfirmError.css("display", "none");
            passwordConfirmError.next().css("border-color", blueDark);
        }*/
        
        return false;
    }
    
    return false;
}

$("#signupForm").submit(function(event) {
    //console.log('form submitted.');
    if (!grecaptcha.getResponse()) {
        //console.log('captcha not yet completed.');
        event.preventDefault(); //prevent form submit
        grecaptcha.execute();
    } else {
        $("form[name='signupForm']")[0].submit();
        //console.log('form really submitted.');
    }
});

onCompleted = function() {
    //console.log('captcha completed.');
    //$('#signupForm').submit();
    $("form[name='signupForm']")[0].submit();
    //alert('wait to check for "captcha completed" in the console.');
}