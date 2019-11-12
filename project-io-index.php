<?php
/*
 * Internal function for API calls using cURL
 * 
 * @param string $api_url LR API endpoint to call
 * @param string $payload any data to pass to the API endpoint in JSON format!
 * @param string $method API method (POST / PUT)
 * 
 * @return $result cURL response from API call, if good it will be in JSON! 
 */

function lr_api_call($api_url, $payload, $method) 
{
    $header = array("Content-Type: application/json", "Content-Length: ".strlen($payload));
    $ch = curl_init();  //cURL setup
    curl_setopt($ch, CURLOPT_URL, $api_url);
    if ($method == "PUT") {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    }
    else {
        curl_setopt($ch, CURLOPT_POST, true);
    }
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, false);  //don't set to true or all LR API error codes are not coming through! 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  //disable SSL check!
    $result = curl_exec($ch);  //execute
    curl_close($ch);  //close connection
    return $result;
}

header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

//HTTPS enforcement
if ($_SERVER['HTTPS'] != "on")  
{ 
	$url = "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	$_SERVER['SERVER_PORT'] = "443";
	header("location: $url");
	exit();    
}

include "project-io-config.php";
/*$api_key = "ddff8a63-cbc3-4723-8415-b910c4d8770d";  //IO HPA API key - WILL BE CHANGED!!!!!
$site_domain = "https://lriodev.wpengine.com";
$hpa_url = "https://lr-dev-deadpool-hpa-cluster-dev1.div4.io/hpa/v1";
$provision_url = "http://ae5924b70f51111e9b30c0aacafe597f-457779803.us-east-1.elb.amazonaws.com/provision";
$admin_console_url = "https://devadmin-console.loginradius.io/login";
$debug_email = "felix.ho@loginradius.com";*/

session_start();
date_default_timezone_set('America/Vancouver');
$api_error_codes_system = array("908", "920", "934", "935", "937", "950", "965", "1034", "1190", "4123", "7809");
$api_error_codes_user = array("936", "938", "944", "966", "991", "1038", "1130", "1175", "1198");

//router system
$request = $_SERVER['REQUEST_URI'];
$split_url = explode("/", $request);  //there will be 2 or 3 items in array, 1st: empty, 2nd: our target, 3rd: empty
if (count($split_url) > 3) {
    header("location: /");
    exit();  //default: send to home page
}
if (count($split_url) == 3 || count($split_url) == 2) {
    if ($split_url[1] == "") {
        $target_name = "home";  //default: homepage
    }
    else {
        $target_name = htmlentities($split_url[1]);
    }
}
else {
    header("location: /");
    exit();  //default: send to home page
}
if ($target_name == "index" || $target_name == "page-layout" || $target_name == "meta-data" || $target_name == "config" || strpos($target_name, ".php") !== false) {
    header("location: /");
    exit();  //default: send to home page
}

if ($target_name == "xml-sitemap") {
    include "project-io-xml-sitemap.php";
    exit();  //default: send to home page
}

//invoke 1-time only after successful full sgin-up process
/*if ($target_name == "auto-login") {    
    if ($_SESSION['uid'] != "" && $_SESSION['email'] != ""&& $_SESSION['password'] != "") {
        $login_api_url = "$hpa_url/login?apiKey=$api_key";
        $post_data = array("email" => $_SESSION['email'], "password" => base64_decode($_SESSION['password']));
        $payload = json_encode($post_data);
        $reply = json_decode(lr_api_call($login_api_url, $payload, "POST"));
        if (isset($reply->access_token) && isset($reply->expires_in)) {
            //redirect to admin console with access token attached to URL
            session_destroy();
            header("location: $admin_console_url?token=".$reply->access_token);
            exit();       
        }
        else {
            if (in_array($reply->ErrorCode, $api_error_codes_system)/* $reply->ErrorCode != ""*//*) {
                //email
                $msg = "Error code: ".$reply->ErrorCode."\n".$reply->Message."\n".$reply->Description."\n\n";
                $msg .= "Login data:\n\n";
                $msg .= "Email: ".$_SESSION['email']."\n";
                $msg .= "Password: ".$_SESSION['email']."\n";
                mail($debug_email, "$site_name Auto-login System Error", $msg);
                session_destroy();
                header("location: /error/");
                exit();
            }            
            $msg = "API reply dump: ".var_export($reply, true)."\n\n";
            $msg .= "Login data:\n\n";
            $msg .= "Email: ".$_SESSION['email']."\n";
            $msg .= "Password: ".$_SESSION['email']."\n";
            mail($debug_email, "$site_name Auto-login Error??", $msg);
            session_destroy();
            header("location: /error/");
            exit();
        }
    }
    else {
        header("location: /");
        exit();  //default: send to home page
    }
}*/

//handle appname check javascript AJAX call
/*if ($target_name == "check-appname") {    
    if ($_SESSION['uid'] != "" && $_SESSION['name'] != "" && $_SESSION['email'] != "") {
        $check_appname = htmlentities($_GET['appname']);
        $appname_check_reply = json_decode(file_get_contents("http://aeb626146e63a11e9a35b121fdffb546-696474166.us-east-1.elb.amazonaws.com/provision/app?appName=$check_appname"));
        //$appname_check_reply = file_get_contents("http://aeb626146e63a11e9a35b121fdffb546-696474166.us-east-1.elb.amazonaws.com/provision/app?appName=$check_appname");
        //var_dump($appname_check_reply);
        header("content-type: application/json");  //must do this or it will return HTML!
        echo json_encode(array("IsSiteRegistered" => $appname_check_reply->IsSiteRegistered));
        //if ($appname_check_reply->IsSiteRegistered == true) {
            //echo json_encode("{IsSiteRegistered:true}";
        //}
        //else {
            //echo "{IsSiteRegistered:false}";
        //}
        //echo $appname_check_reply->IsSiteRegistered;
        //return $appname_check_reply;
        //echo file_get_contents("http://aeb626146e63a11e9a35b121fdffb546-696474166.us-east-1.elb.amazonaws.com/provision/app?appName=".htmlentities($_GET['appname']));
        exit();
    }
    else {
        header("location: /");
        exit();  //default: send to home page
    }
}*/

if (!is_file($_SERVER['DOCUMENT_ROOT']."/project-io-$target_name.php")) {
    header("location: /404/");
    exit();  //default: 404
}
//special check for project (AppName) setup page - no direct access!
if ($target_name == "finish-signup" && ($_SESSION['uid'] == "" || $_SESSION['name'] == "" || $_SESSION['email'] == "")) {
    header("location: /signup/");
    exit();  //default: back to signup page
}

//account sign-up processing
if (isset($_POST['form-action']) && $_POST['form-action'] == "signup-submit") {
    $separate_pos = strpos($_POST['email'], "@");
    //$firstname = htmlentities(substr($_POST['name'], 0, $separate_pos));
    //$lastname = htmlentities(substr($_POST['name'], $separate_pos + 1));
    $email = htmlentities($_POST['email']);
    $firstname = htmlentities(substr($_POST['email'], 0, $separate_pos));
    $lastname = "";
    $password = htmlentities($_POST['password']);
    //$promocode = htmlentities($_POST['promocode']);
    $promocode = "";  //will handle promocode in the future, default to empty for now

    //PROMO CODE VALIDATION

    preg_match('/([A-Z])/', $password, $upper_matches);
    if (count($upper_matches) == 0) {
        $_SESSION['error_message'] = '<div><p class="error" id="user-error">'."Password needs to contain at least one uppercase letter.</p></div>";
        //$_SESSION['name'] = "$firstname $lastname";
        $_SESSION['name'] = $firstname;
        $_SESSION['email'] = $email;
        header("location: /signup/");
        exit();
    }
    preg_match('/([\d])/', $password, $digit_matches);
    if (count($digit_matches) == 0) {
        $_SESSION['error_message'] = '<div><p class="error" id="user-error">'."Password needs to contain at least one digit.</p></div>";
        //$_SESSION['name'] = "$firstname $lastname";
        $_SESSION['name'] = $firstname;
        $_SESSION['email'] = $email;
        header("location: /signup/");
        exit();
    }
    preg_match('/([\W])/', $password, $special_matches);
    if (count($special_matches) == 0) {
        $_SESSION['error_message'] = '<div><p class="error" id="user-error">'."Password needs to contain at least one special character.</p></div>";
        //$_SESSION['name'] = "$firstname $lastname";
        $_SESSION['name'] = $firstname;
        $_SESSION['email'] = $email;
        header("location: /signup/");
        exit();
    }
    if (strlen($password) < 8) {
        $_SESSION['error_message'] = '<div><p class="error" id="user-error">'."Password is too short.</p></div>";
        //$_SESSION['name'] = "$firstname $lastname";
        $_SESSION['name'] = $firstname;
        $_SESSION['email'] = $email;
        header("location: /signup/");
        exit();
    }

    //registration API: change the email template and the verification link (domain part) here!
    $register_api_url = "$hpa_url/register?apiKey=$api_key&emailtemplate=test-io&verificationurl=$site_domain/signup-verification/";
    if ($promocode == "") {
        $post_data = array("firstname" => $firstname, "lastname" => $lastname, "email" => $email, "password" => $password);
    }
    else {
        $post_data = array("firstname" => $firstname, "lastname" => $lastname, "email" => $email, "password" => $password, "customfields" => array("promo_code" => $promocode));
    }        
    $payload = json_encode($post_data);
    $reply = json_decode(lr_api_call($register_api_url, $payload, "POST"));
    if (isset($reply->Uid) && $reply->Uid != "") {    
        if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") {
            $_SESSION['error_message'] = "";  //remove error state
        }
        $_SESSION['uid'] = $reply->Uid;
        //$_SESSION['name'] = "$firstname $lastname";
        $_SESSION['name'] = $firstname;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = base64_encode($password);
        //remove all special characters!
        $temp_appname = str_replace(array('\'', '"', ',', '.', ';', ':', '<', '>', '~', '`', '!', '#', '\$', '%', '^', '&', '*', '(', ')', '/', '?', '{', '}', '[', ']', '_', '+', '='), '-', $firstname);
        if (strlen($temp_appname) > 5) {
            $suggest_appname = "dev-".substr($temp_appname, 0, 5)."-".mt_rand(10000, 99999);
        }
        else {
            $suggest_appname = "dev-$temp_appname-".mt_rand(10000, 99999);
        }
        $_SESSION['suggest_appname'] = $suggest_appname;       
        $_SESSION['domain'] = htmlentities(substr($email, $separate_pos + 1));
        $_SESSION['location'] = "US";  //force datacenter default
        header("location: /finish-signup/");  //second step
        exit();
    }
    else {
        if (in_array($reply->ErrorCode, $api_error_codes_system)/* $reply->ErrorCode != ""*/) {
            //email
            $msg = "Error code: ".$reply->ErrorCode."\n".$reply->Message."\n".$reply->Description."\n\n";
            $msg .= "Signup data:\n\n";
            //$msg .= "Name: $firstname $lastname\n";
            $msg .= "Name: $firstname\n";
            $msg .= "Email: $email\n";
            $msg .= "Password: ".base64_encode($password)."\n";
            mail($debug_email, "$site_name Signup Submission System Error", $msg);
            header("location: /error/");
            exit();
        }
        if (in_array($reply->ErrorCode, $api_error_codes_user)) {
            $_SESSION['error_message'] = '<div><p class="error" id="user-error">'.$reply->Message."<br>$reply->Description</p></div>";
            //$_SESSION['name'] = "$firstname $lastname";
            $_SESSION['name'] = $firstname;
            $_SESSION['email'] = $email;
            header("location: /signup/");
            exit();
        }
        $msg = "API reply dump: ".var_export($reply, true)."\n\n";
        $msg .= "Signup data:\n\n";
        //$msg .= "Name: $firstname $lastname\n";
        $msg .= "Name: $firstname\n";
        $msg .= "Email: $email\n";
        $msg .= "Password: ".base64_encode($password)."\n";
        mail($debug_email, "$site_name Signup Submission Error??", $msg);
        header("location: /error/");
        exit();
    }
}

//project (AppName) setup processing
if (isset($_POST['form-action']) && $_POST['form-action'] == "project-setup-submit") {
    //check appname first
    $appname = htmlentities($_POST['appname']);
    $domain = htmlentities($_POST['domain']);
    $location = htmlentities($_POST['datacenter']);  //db location
    if (strpos($appname, "-") != 0 && substr($appname, 0, 1) == "-") {
        $_SESSION['error_message'] = '<div><p class="error" id=user-error>Sorry, an App Name cannot begin with &quot;-&quot;</p></div>';
        $_SESSION['domain'] = $domain;
        $_SESSION['location'] = $location;
        header("location: /finish-signup/");
        exit();
    }
    $appname_check_reply = json_decode(file_get_contents("$provision_url/app?appName=$appname"));
    //API error
    if (in_array($appname_check_reply->ErrorCode, $api_error_codes_system)/* $reply->ErrorCode != ""*/) {
        //email
        $msg = "Error code: ".$appname_check_reply->ErrorCode."\n".$appname_check_reply->Message."\n".$appname_check_reply->Description."\n\n";
        $msg .= "Submitted data:\n\n";
        $msg .= "Name: ".$_SESSION['name']."\n";
        $msg .= "Email: ".$_SESSION['email']."\n";
        $msg .= "UID: ".$_SESSION['uid']."\n";
        $msg .= "AppName: $appname\n";
        $msg .= "Domain: $domain\n";
        $msg .= "DB Location: $location\n";
        mail($debug_email, "$site_name AppName Check System Error", $msg);
        header("location: /error/");
        exit();
    }
    //IF appname is not available, prompt for a new one! => throw back to the form
    if (isset($appname_check_reply->IsSiteRegistered) && $appname_check_reply->IsSiteRegistered === true) {
        $_SESSION['error_message'] = '<div><p class="error" id=user-error>Sorry, the app name you chose is not available<br>Please create a new one or use the one suggested below.</p></div>';
        $_SESSION['suggest_appname'] = $appname_check_reply->AvailableSiteName;
        $_SESSION['domain'] = $domain;
        $_SESSION['location'] = $location;
        header("location: /finish-signup/");
        exit();
    }
    else {
        //we can try creating the site
        $default_db_locations = array("US", "EU", "CANADA", "APAC", "AUSTRALIA");
        if (!in_array($location, $default_db_locations)) {
            $location = "US";  //force default
        }
        $create_site_api_url = "$provision_url/app?apiKey=$api_key";
        $post_data = array("Name" => $_SESSION['name'], "Email" => $_SESSION['email'], "Uid" => $_SESSION['uid'], "AppName" => $appname, "Domain" => $domain, "Location" => $location);
        $payload = json_encode($post_data);
        $reply = json_decode(lr_api_call($create_site_api_url, $payload, "POST"));
        if (isset($reply->IsPosted) && $reply->IsPosted === true) {
            //if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") {
                //$_SESSION['error_message'] = "";  //remove error state
            //}
            //header("location: /signup-thank-you/");
            //header("location: /auto-login/");
            //exit();
            //log user to admin console
            $login_api_url = "$hpa_url/login?apiKey=$api_key";
            $post_data = array("email" => $_SESSION['email'], "password" => base64_decode($_SESSION['password']));
            $payload = json_encode($post_data);
            $reply = json_decode(lr_api_call($login_api_url, $payload, "POST"));
            if (isset($reply->access_token) && isset($reply->expires_in)) {
                //redirect to admin console with access token attached to URL
                session_destroy();
                header("location: $admin_console_url?token=".$reply->access_token);
                exit();       
            }
            else {
                if (in_array($reply->ErrorCode, $api_error_codes_system)/* $reply->ErrorCode != ""*/) {
                    //email
                    $msg = "Error code: ".$reply->ErrorCode."\n".$reply->Message."\n".$reply->Description."\n\n";
                    $msg .= "Login data:\n\n";
                    $msg .= "Email: ".$_SESSION['email']."\n";
                    $msg .= "Password: ".$_SESSION['email']."\n";
                    mail($debug_email, "$site_name Auto-login System Error", $msg);
                    session_destroy();
                    header("location: /error/");
                    exit();
                }            
                $msg = "API reply dump: ".var_export($reply, true)."\n\n";
                $msg .= "Login data:\n\n";
                $msg .= "Email: ".$_SESSION['email']."\n";
                $msg .= "Password: ".$_SESSION['email']."\n";
                mail($debug_email, "$site_name Auto-login Error??", $msg);
                session_destroy();
                header("location: /error/");
                exit();
            }

        }
        else {
            if (in_array($reply->ErrorCode, $api_error_codes_system)/* $reply->ErrorCode != ""*/) {
                //email
                $msg = "Error code: ".$reply->ErrorCode."\n".$reply->Message."\n".$reply->Description."\n\n";
                $msg .= "Submitted data:\n\n";
                $msg .= "Name: ".$_SESSION['name']."\n";
                $msg .= "Email: ".$_SESSION['email']."\n";
                $msg .= "UID: ".$_SESSION['uid']."\n";
                $msg .= "AppName: $appname\n";
                $msg .= "Domain: $domain\n";
                $msg .= "DB Location: $location\n";
                mail($debug_email, "$site_name AppName Setup Submission System Error", $msg);
                if ($reply->ErrorCode == "4123") {
                    header("location: /error-limit-exceed/");
                }
                else {
                    header("location: /error/");
                }
                exit();
            }
            if (in_array($reply->ErrorCode, $api_error_codes_user)) {
                $_SESSION['error_message'] = '<div><p class="error" id="user-error">'.$reply->Message."<br>$reply->Description</p></div>";
                $_SESSION['domain'] = $domain;
                header("location: /finish-signup/");
                exit();
            }
            $msg = "API reply dump: ".var_export($reply, true)."\n\n";
            $msg .= "Submitted data:\n\n";
            $msg .= "Name: ".$_SESSION['name']."\n";
            $msg .= "Email: ".$_SESSION['email']."\n";
            $msg .= "UID: ".$_SESSION['uid']."\n";
            $msg .= "AppName: $appname\n";
            $msg .= "Domain: $domain\n";
            $msg .= "DB Location: $location\n";
            mail($debug_email, "$site_name AppName Setup Submission Error??", $msg);
            header("location: /error/");
            exit();
        }
    }
}

//sign-up email verification processing (retrieve verification code from URL, as well as email)
if ($target_name == "signup-verification" && isset($_GET['vtype']) && $_GET['vtype'] == "emailverification" && isset($_GET['vtoken']) && $_GET['vtoken'] != "" && isset($_GET['email']) && $_GET['email'] != "") {
    $account_verify = false;  //flags
    $already_verify = false;
    $verify_again = false;
    $verification_code = htmlentities($_GET['vtoken']);
    $email_verify_api_url = "$hpa_url/email/verify?apiKey=$api_key";
    $post_data = array("verificationtoken" => $verification_code);
    $payload = json_encode($post_data);
    $reply = json_decode(lr_api_call($email_verify_api_url, $payload, "PUT"));
    if (isset($reply->IsPosted) && $reply->IsPosted === true) {
        $account_verify = true;
    }
    else if ($reply->ErrorCode == "974") {
        //account already verified => NO NEED TO DO ANYTHING!!
        $account_verify = true;
        $already_verify = true;
    }        
    else if ($reply->ErrorCode == "975") {
        //NOT VERIFIED BUT code expired => regenerate verification code
        $verify_again = true;
        $target_email = htmlentities($_GET['email']);
        $reverify_api_url = "$hpa_url/email/resendverify?apiKey=$api_key&emailtemplate=test-io&verificationurl=$site_domain/signup-verification/";
        $post_data = array("email" => $target_email);
        $payload = json_encode($post_data);
        $reverify_reply = json_decode(lr_api_call($reverify_api_url, $payload, "PUT"));
    }
    else {
        if (in_array($reply->ErrorCode, $api_error_codes_system)/* $reply->ErrorCode != ""*/) {
            //email
            $msg = "Error code: ".$reply->ErrorCode."\n".$reply->Message."\n".$reply->Description."\n\n";
            $msg .= "Login data:\n\n";
            $msg .= "Email: ".$_GET['email']."\n";
            //$msg .= "Password: ".base64_encode($password)."\n";
            mail($debug_email, "$site_name Email Verify API System Error", $msg);
            header("location: /error/");
            exit();
        }
        /*if (in_array($reply->ErrorCode, $api_error_codes_user)) {
            //$error_message = '<p class="error emailError">'.$reply->Message."<br>$reply->Description</p>";
            $_SESSION['error_message'] = '<p class="error emailError">'.$reply->Message."<br>$reply->Description</p>";
            $_SESSION['email'] = $email;
            //email
            //$msg = "Error code: ".$reply->ErrorCode."\n".$reply->Message."\n".$reply->Description."\n\n";
            //$msg .= "Signup data:\n\n";
            //$msg .= "Name: $firstname $lastname\n";
            //$msg .= "Email: $email\n";
            //$msg .= "Password: ".base64_encode($password)."\n";
            //mail($debug_email, "$site_name Signup Submission System Error", $msg);
            //header("location: /login/");
            //exit();
        }*/
        $msg = "API reply dump: ".var_export($reply, true)."\n\n";
        $msg .= "Login data:\n\n";
        //$msg .= "Name: $firstname $lastname\n";
        $msg .= "Email: ".$_GET['email']."\n";
        //$msg .= "Password: ".base64_encode($password)."\n";
        mail($debug_email, "$site_name Email Verify API Error??", $msg);
        header("location: /error/");
        exit();
    }
}

//login processing
//mode 1: normal => redirect to IO Admin Console (will need to pass the token??)
if (isset($_POST['form-action']) && $_POST['form-action'] == "login-submit") {
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $login_api_url = "$hpa_url/login?apiKey=$api_key";
    $post_data = array("email" => $email, "password" => $password);
    $payload = json_encode($post_data);
    $reply = json_decode(lr_api_call($login_api_url, $payload, "POST"));
    if (isset($reply->access_token) && isset($reply->expires_in)) {
        //check if account has verified email address (if not: send reverification email)
        $identity_check_reply = json_decode(file_get_contents("$hpa_url/profile?apiKey=$api_key&access_token=$reply->access_token"));
        if ($identity_check_reply->EmailVerified == NULL) {
            $reverify_api_url = "$hpa_url/email/resendverify?apiKey=$api_key&emailtemplate=test-io&verificationurl=$site_domain/signup-verification/";
            $post_data = array("email" => $email);
            $payload = json_encode($post_data);
            $reverify_reply = json_decode(lr_api_call($reverify_api_url, $payload, "PUT"));
        }
        $appname_exist_check = json_decode(file_get_contents("$provision_url/apps?Uid=".$identity_check_reply->Uid));
        var_dump($appname_exist_check);
        if (isset($appname_exist_check->IsExist) && $appname_exist_check->IsExist == false) {
            //force back to the appName setup page!
            $separate_pos = strpos($email, "@");
            $_SESSION['uid'] = $identity_check_reply->Uid;
            $_SESSION['name'] = $identity_check_reply->FirstName;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = base64_encode($password);
            if (strlen($identity_check_reply->FirstName) > 5) {
                $_SESSION['suggest_appname'] = "dev-".substr($identity_check_reply->FirstName, 0, 5)."-".mt_rand(10000, 99999);
            }
            else {
                $_SESSION['suggest_appname'] = "dev-$identity_check_reply->FirstName-".mt_rand(10000, 99999);
            } 
            $_SESSION['domain'] = htmlentities(substr($email, $separate_pos + 1));
            $_SESSION['location'] = "US";  //force datacenter default
            header("location: /finish-signup/");  //second step
            exit();
        }
        session_destroy();
        header("location: $admin_console_url?token=".$reply->access_token);
        exit();
    }
    else {
        if (in_array($reply->ErrorCode, $api_error_codes_system)/* $reply->ErrorCode != ""*/) {
            //email
            $msg = "Error code: ".$reply->ErrorCode."\n".$reply->Message."\n".$reply->Description."\n\n";
            $msg .= "Login data:\n\n";
            $msg .= "Email: $email\n";
            $msg .= "Password: ".base64_encode($password)."\n";
            mail($debug_email, "$site_name Login Form Submission System Error", $msg);
            header("location: /error/");
            exit();
        }
        if (in_array($reply->ErrorCode, $api_error_codes_user)) {
            $_SESSION['error_message'] = '<div><p class="error" id="user-error">'.$reply->Message."<br>$reply->Description</p></div>";
            $_SESSION['email'] = $email;
            //email
            //$msg = "Error code: ".$reply->ErrorCode."\n".$reply->Message."\n".$reply->Description."\n\n";
            //$msg .= "Signup data:\n\n";
            //$msg .= "Name: $firstname $lastname\n";
            //$msg .= "Email: $email\n";
            //$msg .= "Password: ".base64_encode($password)."\n";
            //mail($debug_email, "$site_name Signup Submission System Error", $msg);
            header("location: /login/");
            exit();
        }
        $msg = "API reply dump: ".var_export($reply, true)."\n\n";
        $msg .= "Login data:\n\n";
        $msg .= "Name: $firstname $lastname\n";
        $msg .= "Email: $email\n";
        $msg .= "Password: ".base64_encode($password)."\n";
        mail($debug_email, "$site_name Login Form Error??", $msg);
        header("location: /error/");
        exit();
    }
}

//forgot PW
if (isset($_POST['form-action']) && $_POST['form-action'] == "forgot-pw-submit") {
    $email = htmlentities($_POST['email']);
    $forgot_pw_api_url = "$hpa_url/password/forgot?apiKey=$api_key&emailTemplate=reset-test-io&resetPasswordUrl=$site_domain/reset-password/";
    $post_data = array("email" => $email);
    $payload = json_encode($post_data);
    $reply = json_decode(lr_api_call($forgot_pw_api_url, $payload, "POST"));
    if (isset($reply->IsPosted) && $reply->IsPosted == true) {
        $show_form = "N";
    }
    else {
        if (in_array($reply->ErrorCode, $api_error_codes_system)) {
            //email
            $msg = "Error code: ".$reply->ErrorCode."\n".$reply->Message."\n".$reply->Description."\n\n";
            $msg .= "Submit data:\n\n";
            $msg .= "Email: $email\n";
            mail($debug_email, "Project IO Forgot PW Form Submission System Error", $msg);
            header("location: /error/");
            exit();
        }
        else if (in_array($reply->ErrorCode, $api_error_codes_user)) {
            $_SESSION['error_message'] = '<div><p class="error" id="user-error">'.$reply->Message."<br>$reply->Description</p></div>";
            $_SESSION['email'] = $email;
        }
        else {
            $msg = "API reply dump: ".var_export($reply, true)."\n\n";
            $msg .= "Submit data:\n\n";
            $msg .= "Email: $email\n";
            mail($debug_email, "$site_name Forgot PW Form Error??", $msg);
            header("location: /error/");
            exit();
        }        
    }
}

//account PW reset
if ($target_name == "reset-password") {
    //show reset PW form
    if (isset($_GET['vtype']) && $_GET['vtype'] == "reset" && isset($_GET['vtoken']) && $_GET['vtoken'] != "") {
        $_SESSION['reset_token'] = htmlentities($_GET['vtoken']);
        $show_form = "Y";
    }
    //process reset PW request
    else if (isset($_POST['form-action']) && $_POST['form-action'] == "reset-pw-submit" && isset($_SESSION['reset_token']) && $_SESSION['reset_token'] != "") {
        $new_password = htmlentities($_POST['password']);
        $confirm_password = htmlentities($_POST['passwordconfirm']);
        if ($new_password != $confirm_password) {
            $_SESSION['error_message'] = '<div><p class="error" id="user-error">'."Passwords not matching.</p></div>";
            header("location: /reset-password/?vtype=reset&vtoken=".$_SESSION['reset_token']);
            exit();
        }
        else {
            preg_match('/([A-Z])/', $new_password, $upper_matches);
            if (count($upper_matches) == 0) {
                $_SESSION['error_message'] = '<div><p class="error" id="user-error">'."Password needs to contain at least one uppercase letter.</p></div>";
                header("location: /reset-password/?vtype=reset&vtoken=".$_SESSION['reset_token']);
                exit();
            }
            preg_match('/([\d])/', $new_password, $digit_matches);
            if (count($digit_matches) == 0) {
                $_SESSION['error_message'] = '<div><p class="error" id="user-error">'."Password needs to contain at least one digit.</p></div>";
                header("location: /reset-password/?vtype=reset&vtoken=".$_SESSION['reset_token']);
                exit();
            }
            preg_match('/([\W])/', $new_password, $special_matches);
            if (count($special_matches) == 0) {
                $_SESSION['error_message'] = '<div><p class="error" id="user-error">'."Password needs to contain at least one special character.</p></div>";
                header("location: /reset-password/?vtype=reset&vtoken=".$_SESSION['reset_token']);
                exit();
            }
            if (strlen($new_password) < 8) {
                $_SESSION['error_message'] = '<div><p class="error" id="user-error">'."Password is too short.</p></div>";
                header("location: /reset-password/?vtype=reset&vtoken=".$_SESSION['reset_token']);
                exit();
            }
        }
        //call API
        $reset_pw_api_url = "$hpa_url/password/reset?apiKey=$api_key";
        $post_data = array("password" => $new_password, "ResetToken" => $_SESSION['reset_token']);
        $payload = json_encode($post_data);
        $reply = json_decode(lr_api_call($reset_pw_api_url, $payload, "PUT"));
        if (isset($reply->IsPosted) && $reply->IsPosted === true) {
            session_destroy();
            $show_form = "N";
        }
        else {
            if (in_array($reply->ErrorCode, $api_error_codes_system)/* $reply->ErrorCode != ""*/) {
                //email
                $msg = "Error code: ".$reply->ErrorCode."\n".$reply->Message."\n".$reply->Description."\n\n";
                $msg .= "Submit data:\n\n";
                //$msg .= "Email: $email\n";
                $msg .= "Password: ".base64_encode($new_password)."\n";
                mail($debug_email, "$site_name Reset PW API System Error", $msg);
                header("location: /error/");
                exit();
            }
            if (in_array($reply->ErrorCode, $api_error_codes_user)) {
                //error code 1175 token expired
                $_SESSION['error_message'] = '<p class="error emailError">'.$reply->Message."<br>$reply->Description</p>";
                header("location: /forgot-password/");
                exit();
            }
            $msg = "API reply dump: ".var_export($reply, true)."\n\n";
            $msg .= "Submit data:\n\n";
            $msg .= "Password: ".base64_encode($new_password)."\n";
            mail($debug_email, "$site_name Reset PW API Error??", $msg);
            header("location: /error/");
            exit();
        }
    }
    //direct access to page => kick back to home page
    else {
        header("location: /");
        exit();
    }   
}

//render the page
include "project-io-page-layout.php";
?>