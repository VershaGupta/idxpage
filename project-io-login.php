<?php //signup page content ?>
<section class="bg-light-01">
    <div class="grid-100 main-hero margin-bottom--lg margin-top--lg">
        <div class="center-100">
            <div class="align-block-center">
                <h1 class="margin-bottom--md">Account Login</h1>
                <p>Don't have an account? <a href="/signup/">Sign up for free.</a></p>
                <form action="/login/" name="loginForm" method="post" id="loginForm">
                    <input type="hidden" name="form-action" value="login-submit">
                    <?php if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") { echo $_SESSION['error_message']; } ?>
                <div>
                    <div class="labels">
                        <label for="email">Email*</label>
                    </div>
                    <p class="error emailError align-left"></p>
                    <input type="text" name="email" autocomplete="email"<?php if (isset($_SESSION['email']) && $_SESSION['email'] != "") { ?>value="<?php echo $_SESSION['email']; ?>"<?php } ?>>
                </div>
                <div>
                    <div class="labels">
                        <label for="password">Password*</label>
                    </div>
                    <p class="error passwordError align-left"></p>
                    <input type="password" name="password" autocomplete="current-password">
                    <p><a href="/forgot-password/">Forgot your password?</a></p>
                </div>
                <div>
                    <div id='recaptcha' class="g-recaptcha" data-sitekey="6LfFubcUAAAAAGBTAR_r92QwnhInqJcCXKkW7Mcb" data-callback="onCompleted" data-size="invisible"></div>
                    <input class="btn-primary" onclick="return validateLoginForm()" type="submit" name="submit-form" value="Login">
                </div>
                </form>
            </div>
        </div>
    </div>
    <svg id="signup-hero" class="svg-background"></svg>
</section>