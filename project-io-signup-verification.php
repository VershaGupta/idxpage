<?php //sign-up thank you page ?>
<section class="bg-light-01">
    <div class="grid-100 main-hero padding-bottom--x-lg padding-top--x-lg margin-bottom--x-lg margin-top--x-lg">
        <div>
<?php 
if ($account_verify == true) { 
    if ($already_verify == true) { ?>
            <h1>Your account has already verified.</h1>
            <p><a href="/login">Log in to your account</a>.</p>
<?php
    }
    else { ?>
            <h1>Thank you! Your account has been verified.</h1>
            <p><a href="/login">Log in to your account</a>.</p>
<?php 
    }  
?>
<script>
setTimeout(function() {
    window.location.href = "/";
}, 10000);
</script>
<?php 
} 
else if ($verify_again == true) { ?>
            <h1>Your verificaton code has expired.</h1>
            <p>A new verification request has been sent to you, please verifiy your account.</p>
<?php } ?>           
        </div>
    </div>
    <svg id="signup-hero" class="svg-background"></svg>
</section>