<?php
include "includes/header.php";
?>
			

				<!-- Start destinations Area -->
                <section class="destinations-area section-gap">
				<div class="container">
					<div class = "container-fluid">
						<div class = "panel panel-default">
							<div class = "panel-body">
								<div class = "alert alert-info">Accounts</div>
								<a class = "btn btn-success" href = "add_account.php"><i class = "glyphicon glyphicon-plus"></i> Create New Account</a>
								<br />
								<br />
								<table id = "table" class = "table table-bordered">
									<thead>
										<tr>
											<th>Name</th>
											<th>Username</th>
											<th>Password</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php  
											$query = $conn->query("SELECT * FROM `admin`") or die(mysqli_error());
											while($fetch = $query->fetch_array()){
										?>
										<tr>
											<td><?php echo $fetch['name']?></td>
											<td><?php echo $fetch['username']?></td>
											<td><?php echo md5($fetch['password'])?></td>
											<td><center><a class = "btn btn-warning" href = "edit_account.php?admin_id=<?php echo $fetch['admin_id']?>"><i class = "glyphicon glyphicon-edit"></i> Edit</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "delete_account.php?admin_id=<?php echo $fetch['admin_id']?>"><i class = "glyphicon glyphicon-remove"></i> Delete</a></center></td>
										</tr>
										<?php
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>	
			</section>
			<!-- End destinations Area -->

			<script type = "text/javascript">
				function confirmationDelete(anchor){
					var conf = confirm("Are you sure you want to delete this record?");
					if(conf){
						window.location = anchor.attr("href");
					}
				} 
			</script>

			<script type = "text/javascript">
				$(document).ready(function(){
					$("#table").DataTable();
				});
			</script>

<?php
	include "includes/footer.php";
?>