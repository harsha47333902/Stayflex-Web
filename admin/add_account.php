<?php
include "includes/header.php";
?>
			
			

            <section class="destinations-area section-gap">
				<div class="container">
					<div class = "container-fluid">
						<div class = "panel panel-default">
							<div class = "panel-body">
								<div class = "alert alert-info">Account / Create Account</div>
								<br />
								<div class = "col-md-4">	
									<form method = "POST">
										<div class = "form-group">
											<label>Name </label>
											<input type = "text" class = "form-control" name = "name" />
										</div>
										<div class = "form-group">
											<label>Username </label>
											<input type = "text" class = "form-control" name = "username" />
										</div>
										<div class = "form-group">
											<label>Password </label>
											<input type = "password" class = "form-control" name = "password" />
										</div>
										<br />
										<div class = "form-group">
											<button name = "add_account" class = "btn btn-info form-control"><i class = "glyphicon glyphicon-save"></i> Saved</button>
										</div>
									</form>
									<?php require_once 'add_query_account.php'?>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
			
<?php
	include "includes/footer.php";
?>