<?php //frogot password form
?>
<section class="bg-light-01">
    <div class="grid-100 main-hero margin-bottom--lg margin-top--lg">
        <div class="center-100">
            <div class="align-block-center">
                <h1 class="margin-bottom--md">Forgot Password?</h1>
<?php 
if ($show_form == "N") { ?>
                <div>
                    <p>You will receive an email with further instructions.</p>
                </div>
<?php
}
else { ?>
                <form action="/forgot-password/" name="forgotPWForm" method="post" id="forgotPWForm">
                    <input type="hidden" name="form-action" value="forgot-pw-submit">
                    <?php if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") { echo $_SESSION['error_message']; } ?>
                <div>
                	<div class="labels">
                        <label for="email">Email*</label>
                    </div>
                    <p class="error emailError"></p>
                    <input type="text" name="email" autocomplete="email"<?php if (isset($_SESSION['email']) && $_SESSION['email'] != "") { ?>value="<?php echo $_SESSION['email']; ?>"<?php } ?>>
                </div>
                <div>
                    <div id='recaptcha' class="g-recaptcha" data-sitekey="6LfFubcUAAAAAGBTAR_r92QwnhInqJcCXKkW7Mcb" data-callback="onCompleted" data-size="invisible"></div>
                    <input class="btn-primary" onclick="return validateForgotPWForm()" type="submit" name="submit-form" value="Submit">
                </div>
                </form>
<?php
}
?>
            </div>
        </div>
    </div>
    <svg id="signup-hero" class="svg-background"></svg>
</section>