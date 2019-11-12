<!DOCTYPE html>

<html>


	<head>
		<?php include 'global/includeHeader.php';?>
	  	<title>LoginRadius IO - Sign Up</title>
	</head>



    <body>
        <?php include 'global/nav.php';?>

         
         
        <section class="bg-light-01">
            <div class="grid-100 main-hero margin-bottom--lg margin-top--lg">
                <div class="center-50">
                    <div class="align-block-left">
                        <h2>Create account</h2>


                        <form action="thankyou.php" name="signupForm">
                            <div>
                                <label for="name">Full Name*</label>
                                <p class="error nameError">This is the error message</p>
                                <input type="text" name="name">
                            </div>
                            
                            <div>
                                <label for="email">Email*</label>
                                <p class="error emailError"></p>
                                <input type="text" name="email">
                            </div>
                            
                            <div>
                                <label for="password">Password (min 4 characters)*</label>
                                <p class="error passwordError"></p>
                                <input type="password" name="password">
                            </div>
                            
                            <div>
                                <label for="passwordconfirm">Confirm Password*</label>
                                <p class="error passwordConfirmError"></p>
                                <input type="password" name="passwordconfirm">
                            </div>
                            
                            <div>
                                <input class="btn-primary" onclick="return validateSignUpForm()" type="submit" value="Free Sign Up">
                            </div>
                        </form>

                    </div>

                    <div class="align-block-left signup">
                        <h3>1. Sign up for free</h3>
                        <p>Enter your email to get started with a new account.</p>

                        <h3>2. Integrate us into your project</h3>
                        <p>Add the CDN link provided to your project's pages.</p>

                        <h3>3. Start authenticating users</h3>
                        <p>Play around or look to our guides for ideas to implement your identity workflow.</p>

                    <!--<a class="btn-primary" href="signup.php">Start Now</a>-->
                    </div>
                </div>
            </div>

            <svg id="signup-hero" class="svg-background"></svg>
        </section>
         
         
         
         
         
         
        
         


        <?php include 'global/footer.php';?>
         
         
         
         
        <?php include 'global/includeJS.php';?>
    </body>


</html>