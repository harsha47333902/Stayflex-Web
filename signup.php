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
                                <div class="contact-details" style="margin:10px 0px;">
                                    <h5>Register</h5>
                                </div>
                            </div>
                            <form class="form-area contact-form text-center" id="register" name="register" method="post" action="#">
                                <input type="hidden" name="action" value="register">
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <input class="common-input mb-20 form-control" placeholder="Enter username" id="regusername" name="regusername" required="" type="text">
                                        <input class="common-input mb-20 form-control" type="email" id="reguseremail" name="reguseremail" placeholder="Your email">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <input class="common-input mb-20 form-control" type="password" id="regpassword" name="regpassword" placeholder="Your password">   
                                        <input class="common-input mb-20 form-control" type="password" id="regcpassword" name="regcpassword" placeholder="Your confirm password">
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <input class="common-input mb-20 form-control" type="text" id="regmobile" name="regmobile" placeholder="Your Mobile Number">  
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="alert-msg" style="text-align: left;"></div>
                                        <button type="button" id="bt_register" class="genric-btn primary">Register</button>   <!-- Removed float: left; -->
                                    </div>
                                </div>
                            </form>
                            <div class="text-center mt-3">
                                <span>Already have an account? <a href="login.php">Login</a></span> <!-- Login link -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>  
</div>




<?php
include "includes/footer.php";
?>