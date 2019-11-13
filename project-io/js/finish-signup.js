function validateFinishSignUpForm() {


    


    var formName = "finishSignupForm";
    
    var appname = document.forms[formName]["appname"].value.trim();
    var domain = document.forms[formName]["domain"].value;
    
    var appnameReason;
    var domainReason;
    //var appnameDuplicate;
    
    //alert(appname);
    if(appname == "") {
        appnameReason = "App Name field cannot be empty";
        //appnameDuplicate = undefined;
    }
    else {
        if (!/^[a-zA-Z0-9-]{3,20}$/.test(appname)) {
            appnameReason = "App Name must be alphanumeric characters, and from 3 to 15 characters long";
        }
        /*$.ajax({
            url: '/check-appname/?appname='+appname,
            dataType: 'json',
            //contentType: 'text/html',
            //success: function(data){
            success: function(data) {
                //var reply = jsn.parse(data);
                //console.log(JSON.stringify(data));
                //console.log(data);
                //alert(data.IsSiteRegistered);
                if (data.IsSiteRegistered) {
                    appnameReason = "App Name provided already taken";
                }
            }
        });*/
    }
    //else {

    //}
    
    if(domain == "") {
        domainReason = "Domain field cannot be empty";
    } else if (!/(?:[a-z0-9](?:[a-z0-9-]{0,61}[a-z0-9])?\.)+[a-z0-9][a-z0-9-]{0,61}[a-z0-9]/.test(domain)){
        domainReason = "Domain is invalid";
    }
    
    //alert(appnameDuplicate)
    
    if(appnameReason == undefined && domainReason == undefined) {
        setTimeout(function () {
            $("input:submit").replaceWith("<div class='button-loader'><div class='lds-ring'><div></div><div></div><div></div><div></div></div></div><p>Please wait while your account is being set up...</p>");
        }, 50);
        
        return true;
        
    } else {
        
        var appnameError = $("form[name='"+formName+"'] .appnameError");
        
        if(appnameReason != undefined) {
            appnameError.text(appnameReason);
            appnameError.css("display", "block");
            appnameError.next().css("border-color", ioRed);
        } else {
            appnameError.css("display", "none");
            appnameError.next().css("border-color", blueDark);
        }
        
        
        var domainError = $("form[name='"+formName+"'] .domainError");
        
        if(domainReason != undefined) {
            domainError.text(domainReason);
            domainError.css("display", "block");
            domainError.next().css("border-color", ioRed);
        } else {
            domainError.css("display", "none");
            domainError.next().css("border-color", blueDark);
        }

        /*var appnameDuplicateError = $("form[name='"+formName+"'] .appnameDuplicateError");

        if(appnameDuplicate != undefined) {
            appnameDuplicateError.text(appnameDuplicate);
            appnameDuplicateError.css("display", "block");
            appnameDuplicateError.next().css("border-color", ioRed);
        } else {
            appnameDuplicateError.css("display", "none");
            appnameDuplicateError.next().css("border-color", blueDark);
        }*/
        
        return false;
    }
    
    return false;
}