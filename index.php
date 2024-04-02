<?php
include "includes/header.php";
include "includes/functions.php";
$CategoryList = getAllCategories($conn);
?>
			

				<!-- Start destinations Area -->
                <section class="destinations-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-40 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">WELCOME TO STAYFLEX</h1>
							
		                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day to.</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">

						<?php
						$start_time = microtime(true);

								
							foreach ($CategoryList as $value) 
							{
								echo '<div class="col-lg-4">
								<div class="single-destinations">
								<div class="thumb"><img style="height:230px;" src="photo/'.$value["photo"].'"  />
								</div>
								<div class="details">
								<h4 class="d-flex justify-content-between">
								<span>'.$value["room_type"].'</span>
								<div class="star">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								</div>
							
								</h4>
								<div>'.$value["description"].'</div>
								<ul class="package-list">
								<li class="d-flex justify-content-between align-items-center">
								<span>Price per night</span>';

								if(isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"] == true)
								{	
									if(getAvailability($conn,$value["roomid"])){
										echo '<a href="javascript:void(0);" class="price-btn" onclick="fetchdetails(\''.$value["roomid"].'\',\''.$value["photo"].'\',\''.$value["room_type"].'\',\''.$value["price"].'\')">₹'.$value["price"].'</a>';
									}else{
										echo '<a href="javascript:void(0);" class="price-btn" > Not Available</a>';
									}
								}else{
									echo '<a href="login.php" class="price-btn" >₹'.$value["price"].'</a>';
								}
								

								echo '</li>
								</ul>
								</div>
								</div>
								</div>';
						
							}

							 $end_time = microtime(true);

// // Calculate response time
$response_time = ($end_time - $start_time) * 1000;

// // Output response time
 echo "<p>Response Time: " . number_format($response_time, 2) . " milliseconds</p>";

						?>
							
					</div>

					
				</div>	
			</section>
			
<?php
include "includes/footer.php";
?>
			


			

		
			
