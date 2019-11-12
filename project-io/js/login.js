function validateLoginForm() {
    var formName = "loginForm";
    
    var email = document.forms[formName]["email"].value.trim();
    var password = document.forms[formName]["password"].value;
    
    var emailReason;
    var passwordReason;
    
    if(email == "") {
        emailReason = "Email field cannot be empty";
    } else if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/.test(email)){
        emailReason = "Input valid email address";
    }
    
    if(password == "") {
        passwordReason = "Password field cannot be empty";
    }
    
    if(emailReason == undefined && passwordReason == undefined) {
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
        
        var passwordError = $("form[name='"+formName+"'] .passwordError");
        
        if(passwordReason != undefined) {
            passwordError.text(passwordReason);
            passwordError.css("display", "block");
            passwordError.next().css("border-color", ioRed);
        } else {
            passwordError.css("display", "none");
            passwordError.next().css("border-color", blueDark);
        }
        return false;
    }
    
    return false;
}

$("#loginForm").submit(function(event) {
    if (!grecaptcha.getResponse()) {
        event.preventDefault(); //prevent form submit
        grecaptcha.execute();
    } else {
        $("form[name='loginForm']")[0].submit();
    }
});
onCompleted = function() {
    $("form[name='loginForm']")[0].submit();
}