<?php
//meta data for LoginRadius IO pages
if ($target_name == "home") { ?>
    <meta name="google-site-verification" content="umbSMjhmUurpPC79YEd4z1xdfuaiXIvHQTW-xrv8WWw" />
    <title>Authorize and authenticate your customers with LoginRadius IO</title>
    <meta name="description" content="LoginRadius provides simple social login, standard login, and SSO so you can securely authentication your customer base." />
<?php } //$target_name == "home" 

else if ($target_name == "finish-signup") { ?>
    <title>Finish Signing Up | LoginRadius IO</title>
    <meta name="description" content="" />
<?php } //$target_name == "finish-signup" 

else if ($target_name == "signup-verification") { ?>
    <title>Verification | LoginRadius IO</title>
    <meta name="description" content="" />
<?php } //$target_name == "signup-verification" 

else if ($target_name == "login") { ?>
    <title>Login | LoginRadius IO</title>
    <meta name="description" content="" />
<?php } //$target_name == "login" 

else if ($target_name == "signup") { ?>
    <title>Signup | LoginRadius IO</title>
    <meta name="description" content="" />
<?php } //$target_name == "signup" 

else if ($target_name == "error") { ?>
    <title>Error | LoginRadius IO</title>
    <meta name="description" content="" />
<?php } //$target_name == "error" 

else if ($target_name == "404") { ?>
    <title>Page Not Found | LoginRadius IO</title>
    <meta name="description" content="" />
<?php } //$target_name == "404" 

else { ?>
    <title>LoginRadius IO</title>
    <meta name="description" content="" />
<?php } //default 
?>