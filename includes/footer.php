


			
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <section class="destinations-area section-gap">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="book" name="book" action="#" method="post" >
                                    <input type="hidden" id="action" name="action" value="book">

                                    <div class="single-destinations">
                                        <div class="thumb">
                                            <img id="room_img" src="photo/" alt="">
                                        </div>
                                        <div class="details">
                                            <h4 class="d-flex justify-content-between">
                                                <span id="room_type" data-rid=""></span>
                                                <input type="hidden" id="room_id" name="room_id" value="">
                                            </h4>

                                            <ul class="package-list">
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>First Name</span>
                                                    <input name="first_name" id="first_name" required>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>Last Name</span>
                                                    <input name="last_name" id="last_name" required>
                                                </li>

                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>No. of Persons</span>
                                                    <label>Adult</label>
                                                    <select name="adult" id="adult" style="width: 20%;" required>
                                                        <option value="">Select</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>

                                                    <label>Children</label>
                                                    <select name="children" id="children" style="width: 20%;" required>
                                                        <option value="">Select</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </li>

                                               

                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>Address</span>
                                                    <input name="address" id="address" required>
                                                </li>

                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>Mobile No</span>
                                                    <input name="mobile" id="mobile" required>
                                                </li>

                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>Check In</span>
                                                    <input name="date" id="date" type="date" style="width: 45%;" required>
                                                </li>

                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>Check Out</span>
                                                    <input name="outdate" id="outdate" type="date" style="width: 45%;" required>
                                                </li>

                                                <li class="d-flex justify-content-between align-items-center">
                                                    <span>Price per night</span>
                                                    <a href="#" class="price-btn" id="room_price">1000</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="bt_book_room" class="btn btn-primary">Book Now</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>






			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>		
 			<script src="js/jquery-ui.js"></script>					
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>					
			<script src="js/owl.carousel.min.js"></script>							
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
			<script src="js/script.js"></script>
			
		</body>
	</html>