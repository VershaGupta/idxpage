<?php //signup page content ?>
<section class="bg-light-01">
    <div class="grid-100 main-hero margin-bottom--lg margin-top--lg">
        <div class="center-50">
            <div class="align-block-left signup">
                <h3>Free sign-up includes:</h3>
                <ul>
                    <li>Dedicated user dashboard.</li>
                    <li>CDN link for your project’s pages.</li>
                    <li>Guides for building identity workflows.</li>
                    <li>Customizable, system-agnostic platform.</li>
                </ul>
            </div>
            <div class="align-block-left">
                <h1 class="margin-bottom--md">Sign up for free</h1>
                <p>Already have an account? <a href="/login">Log in</a>.</p>
                <form action="/signup/" name="signupForm" method="post" id="signupForm">
                    <input type="hidden" name="form-action" value="signup-submit">
                    <?php if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") { echo $_SESSION['error_message']; } ?>
                <?php /*<div>
                    <div class="labels">
                        <label for="name">Full Name*</label>
                    </div>
                    <p class="error nameError">This is the error message</p>
                    <input type="text" name="name" autocomplete="name"<?php if (isset($_SESSION['name']) && $_SESSION['name'] != "") { ?>value="<?php echo $_SESSION['name']; ?>"<?php } ?>>
                </div> */ ?>
                <div>
                    <div class="labels">
                        <label for="email">Email*</label>
                    </div>
                    <p class="error emailError"></p>
                    <input type="text" name="email" autocomplete="email"<?php if (isset($_SESSION['email']) && $_SESSION['email'] != "") { ?>value="<?php echo $_SESSION['email']; ?>"<?php } ?>>
                </div>
                <div>
                    <div class="labels">
                        <label for="password">Password*</label>
                        <p class="note">Min 8 characters, at least 1 uppercase letter, 1 symbol and 1 digit</p>
                    </div>
                    <p class="error passwordError"></p>
                    <input type="password" name="password" autocomplete="new-password">
                </div>
                <?php /*<div>
                    <div class="labels">
                        <label for="passwordconfirm">Confirm Password*</label>
                    </div>
                    <p class="error passwordConfirmError"></p>
                    <input type="password" name="passwordconfirm" autocomplete="new-password">
                </div>
                <div>
                    <div class="labels">
                        <label for="promocode">Promo Code</label>
                    </div>
                    <input type="text" name="promocode">
                </div> */ ?>
                <div>
                    <div id='recaptcha' class="g-recaptcha" data-sitekey="6LfFubcUAAAAAGBTAR_r92QwnhInqJcCXKkW7Mcb" data-callback="onCompleted" data-size="invisible"></div>
                    <input class="btn-primary" onclick="return validateSignUpForm()" type="submit" name="submit-form" value="Sign Up Now">
                </div>
                </form>
            </div>
            
        </div>
    </div>
    <svg id="signup-hero" class="svg-background"></svg>
</section>