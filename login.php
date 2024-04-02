<?php
include "includes/subheader.php";
?>
	  		  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <div id="logo">
                <a href=""><img src="img/logo.png" style="height:150px;" alt="" title="" /></a>
            </div>
			<section class="contact-page-area section-gap">
                <div class="container">
                    <div class="row justify-content-center"> <!-- Center the row content -->
                        <div class="col-lg-12">
                            <div class="single-contact-address d-flex flex-row justify-content-center align-items-center"> <!-- Center the header vertically -->
           					<div class="contact-details" style="margin: 10px 0;">
                				<h5>Login</h5>
            				</div> 
						</div>
            <form class="form-area contact-form text-right" id="login" name="login" action="#" method="post">
                <input type="hidden" name="action" value="login">
                <div class="row">    
                    <div class="col-lg-12 form-group">
                        <input type="email" name="email" id="email" placeholder="Enter email address" class="common-input mb-20 form-control" required="">
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="common-input mb-20 form-control" required="">
                    </div>
                    <div class="col-lg-12 d-flex justify-content-center"> <!-- Center the button horizontally -->
                        <div class="alert-msg"></div>
                        <button type="button" id="bt_login" class="genric-btn primary">Login</button> 
                    </div>
				</div>
					</form> 
                    <div class="col-lg-12 text-center mt-3"> <!-- Align the signup link -->
                        <span>Don't have an account? <a href="signup.php">Sign up</a></span> <!-- Signup link -->
                   
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>  
</div>







			<!-- End contact-page Area -->

			
			
<?php
include "includes/footer.php";
?>
		