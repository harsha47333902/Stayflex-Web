<?php
include "includes/header.php";
?>
			
			
			

            <section class="destinations-area section-gap">
				<div class="container">
					<div class = "container-fluid">
						<div class = "panel panel-default">
							<div class = "panel-body">
								<div class = "alert alert-info">Account / Change Account</div>
								<?php
									$query = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
									$fetch = $query->fetch_array();
								?>
								<br />
								<div class = "col-md-4">	
									<form method = "POST" action = "edit_query_account.php?admin_id=<?php echo $fetch['admin_id']?>">
										<div class = "form-group">
											<label>Name </label>
											<input type = "text" class = "form-control" value = "<?php echo $fetch['name']?>" name = "name" />
										</div>
										<div class = "form-group">
											<label>Username </label>
											<input type = "text" class = "form-control" value = "<?php echo $fetch['username']?>" name = "username" />
										</div>
										<div class = "form-group">
											<label>Password </label>
											<input type = "password" class = "form-control" value = "<?php echo $fetch['password']?>" name = "password" />
										</div>
										<br />
										<div class = "form-group">
											<button name = "edit_account" class = "btn btn-warning form-control"><i class = "glyphicon glyphicon-edit"></i> Save Changes</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End destinations Area -->

<?php
	include "includes/footer.php";
?>