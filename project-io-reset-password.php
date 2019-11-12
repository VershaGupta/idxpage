<?php //frogot password form
?>
<section class="bg-light-01">
    <div class="grid-100 main-hero margin-bottom--lg margin-top--lg">
        <div class="center-100">
            <div class="align-block-center">
                <h1 class="margin-bottom--md">Reset Your Password</h1>
<?php 
if ($show_form == "N") { ?>
                <div>
                    <p>You have reset your account password.</p>
                </div>
<?php
}
else { ?>
                <form action="/reset-password/" name="resetPWForm" method="post" id="resetPWForm">
                    <input type="hidden" name="form-action" value="reset-pw-submit">
                    <?php if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") { echo $_SESSION['error_message']; } ?>
                <div>
                <div>
                    <div class="labels">
                        <label for="password">New Password*</label>
                        <p class="note">Min 8 characters, at least 1 uppercase letter, 1 symbol and 1 digit</p>
                    </div>
                    <p class="error passwordError"></p>
                    <input type="password" name="password" autocomplete="new-password">
                </div>
                <div>
                    <div class="labels">
                        <label for="passwordconfirm">Confirm New Password*</label>
                    </div>
                    <p class="error passwordConfirmError"></p>
                    <input type="password" name="passwordconfirm" autocomplete="new-password">
                </div>
                </div>
                <div>
                    <div id='recaptcha' class="g-recaptcha" data-sitekey="6LfFubcUAAAAAGBTAR_r92QwnhInqJcCXKkW7Mcb" data-callback="onCompleted" data-size="invisible"></div>
                    <input class="btn-primary" onclick="return validateResetPWForm()" type="submit" name="submit-form" value="Submit">
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