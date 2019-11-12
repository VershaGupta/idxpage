<?php //project (AppName) setup page ?>
<section class="bg-light-01">
    <div class="grid-100 main-hero margin-bottom--lg margin-top--lg">
        <div class="center-100">
            <div class="align-block-center">
                <h1 class="margin-bottom--md">Finish Signing Up</h1>
                <form action="/finish-signup/" name="finishSignupForm" method="post" id="finishSignupForm">
                    <input type="hidden" name="form-action" value="project-setup-submit">
                    <?php if (isset($_SESSION['error_message']) && $_SESSION['error_message'] != "") { echo $_SESSION['error_message']; } ?>
                <div>
                	<div class="labels">
                        <label for="appname">Enter your unique tenant name*</label>
                        <p class="note">Create a private “tenant name” for the app you’ll be using on LoginRadius.io.</p>
	                </div>
                    <p class="error appnameError"></p>
                    <p class="error appnameDuplicateError"></p>
                    <input type="text" name="appname" autocomplete="on"<?php if (isset($_SESSION['suggest_appname'])) { ?> value="<?php echo $_SESSION['suggest_appname']; ?>"<?php } ?>>
                </div>
                <div>
                	<div class="labels">
                        <label for="domain">Enter your domain</label>
                        <p class="note">The URL for the app you’ll be using with LoginRadius.io.</p>
	                </div>
                    <p class="error domainError"></p>
                    <input type="text" name="domain"<?php if (isset($_SESSION['domain'])) { ?> value="<?php echo $_SESSION['domain']; ?>"<?php } ?>>
                </div>
                <div>
                	<div class="labels">
	                    <label for="domain">Select your app's data center*</label>
	                </div>
                    <!-- <p class="note">EX: yourdomain.com</p> -->
                    <select name="datacenter">
                        <option value=""></option>
                        <option value="APAC"<?php if (isset($_SESSION['location']) && $_SESSION['location'] == "APAC") { ?> selected="selected"<?php } ?>>Asia-Pacific</option>
                        <option value="AUSTRALIA"<?php if (isset($_SESSION['location']) && $_SESSION['location'] == "AUSTRALIA") { ?> selected="selected"<?php } ?>>Australia</option>
                        <option value="CANADA"<?php if (isset($_SESSION['location']) && $_SESSION['location'] == "CANADA") { ?> selected="selected"<?php } ?>>Canada</option>
                        <option value="EU"<?php if (isset($_SESSION['location']) && $_SESSION['location'] == "EU") { ?> selected="selected"<?php } ?>>European Union</option>
                        <option value="US"<?php if (isset($_SESSION['location']) && $_SESSION['location'] == "US") { ?> selected="selected"<?php } ?>>USA</option>
                    </select>
                </div>
                <div>
                    <input class="btn-primary" onclick="return validateFinishSignUpForm()" type="submit" name="submit-form" value="Finish">
                </div>
                </form>
            </div><!-- 
            <div class="align-block-left signup">
                <h3>Welcome!</h3>
                <p>To start using LoginRadius.IO we need the name of your app and the domain your app will be used on.</p>
            </div> -->
        </div>
    </div>
    <svg id="signup-hero" class="svg-background"></svg>
</section>