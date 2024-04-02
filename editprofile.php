<?php 
include "includes/header.php";


// Establish your database connection here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch room details from the database (replace 'your_table_name' with your actual table name)
// $sql = "SELECT name, email, phone  FROM signup WHERE id = '" . $_SESSION['id'] . "'";
$sql = "SELECT username, mobile, email, image FROM user WHERE id = '" . $_SESSION['uid'] . "'";



$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch and display room details
    $rows = $result->fetch_assoc();
    $username = $rows["username"];
    $mobile = $rows["mobile"];
    $email = $rows["email"];
    $image = $rows["image"];
} else {
    // Handle the case where no data is found
    $username = "N/A";
    $mobile = "N/A";
    $email = "N/A";
}

// Close the database connection
$conn->close();
?>                                                                                                                    


<style>
                            /* Apply styles to the form wrapper */
                            .wrapper {
                                margin-top:70px;
                        text-align: center;
                        
                        border: 2px solid #d8d8d8;
                        box-shadow: ;
                    padding:20px;
                        margin-top: 0px;
                    }
                    .wrapper form {
                        display: flex;
                        flex-direction: column;
                        align-content: center;
                        justify-content: space-between;
                        flex-wrap: wrap;
                        
                    }

                            /* Style the form title */
                            .title {
                                font-size: 24px;
                                margin-bottom: 20px;
                            }

                            /* Style form input rowss */
                            .rows {
                                display: -webkit-box;
                        display: -ms-flexbox;
                        display: flex;
                        -ms-flex-wrap: wrap;
                        flex-wrap: nowrap;
                    padding:20px;
                    
                        flex-direction: row;
                        justify-content: center;
                        margin-bottom:10px;
                    }

                            /* Style input icons */
                            .rows i {
                                font-size: 18px;
                                margin-right: 10px;
                                color: black;
                                padding: 10px;
                            }

                            /* Style form input fields */
                            input[type="text"] {
                                height: 100%;
                                width: 100%;
                                border: 2px solid #999;
                                border-radius: 5px;
                                padding: 10px;
                                font-size: 16px;
                                transition: all 0.3s ease;
                            }

                            /* Style the submit button */
                        
                            .row1.button input[type="submit"] {
                                background-color: #3CC78F;
                                color: #fff;
                                padding: 10px 20px;
                                border: none;
                                border-radius: 5px;
                                cursor: pointer;
                                font-size: 18px;
                            }

                            .row1.button input[type="submit"]:hover {
                                background-color: #999;
                            }

                            /* Add some spacing between the button and the input fields */
                            .rows.button {
                                margin-top: 15px;
                            }
                            .wrapper form .rows  {
                        width: 100%;
                    
                        font-size: 16px;
                        transition: all 0.3s ease;
                    }
                    button {
                        background-color: #1C6ADF;
                        color: white;
                        padding: 10px 15px;
                        border: none;
                        border-radius: 4px;
                        cursor: pointer;
                        }
                        button:hover {
                        background-color: blue;
                        }
    </style>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>
<body>
<div class="container">
    <div class="rows justify-content-center">
        <div class="col-lg-6">
            <div class="section_title text-center mb-55">
                <h3><span>Profile</span></h3>
            </div>
        </div>
    </div>
    <div class="container1">
        <div class="wrapper" style="width: 50%;margin: 0 auto;">
        <div class="profile-picture">
       
    <img id="image" src="img/<?php echo $image; ?>" alt="Profile Picture" style="width: 100px; height: 100px; border-radius: 50%;">
</div>
            <form class="forms" id="updateprofile" enctype="multipart/form-data">
                <input type="hidden" name="action" value="updateprofile">
                <input type="hidden" name="id" value="<?php echo $_SESSION["uid"]; ?>">
                <div class="rows">
                    <i class="fas fa-user"></i>
                    <input type="text" id="name" name="name" placeholder="User Name" value="<?php echo $username; ?>">
                </div>
                <div class="rows">
                    <i class="fas fa-mobile"></i>
                    <input type="text" id="phone" name="phone" placeholder="Phone Number" value="<?php echo $mobile; ?>">
                </div>
                <div class="rows">
                    <i class="fas fa-envelope"></i>
                    <input type="text" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
                </div>
                <div class="rows">
                    <i class="fas fa-image"></i>
                    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 100px; max-height: 100px;">
                </div>
                <button type="button" onclick="updateProfile()">Update Profile</button>
            </form>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();
        reader.onload = function () {
            var img = document.getElementById('imagePreview');
            img.src = reader.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }

    function updateProfile() {
        var formData = new FormData($("#updateprofile")[0]); // Serialize form data
        
        $.ajax({
            type: "POST",
            url: "update_profile.php", // Replace with your PHP script that handles the update
            data: formData,
            processData: false, // Prevent jQuery from processing data
            contentType: false, // Set content type to false
            success: function(response) {
                // Check the response from the server
                if(response.trim() === "success") {
                    // Profile updated successfully
                    alert("Profile updated successfully.");
                } else {
                    // Show error message returned by the server
                    alert(response);
                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText); // Log the error to console
            }
        });
    }
</script>




<?php 
include "includes/footer.php";
?>

