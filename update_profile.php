<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
    // Handle the case where the user is not logged in
    echo "Error: User not logged in.";
    exit;
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish your database connection here
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $userId = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Check if an image file was uploaded
    if(isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Get the temporary file name
        $imageTmpName = $_FILES['image']['tmp_name'];

        // Move the uploaded file to a permanent location
        $imagePath = '' . $_FILES['image']['name'];
        move_uploaded_file($imageTmpName, $imagePath);
    } else {
        // No image uploaded or an error occurred
        $imagePath = ''; // Set image path to empty string or whatever default value you need
    }

    // Update user profile in the database
    $sql = "UPDATE user SET username = '$name', mobile = '$phone', email = '$email', image = '$imagePath' WHERE id = '$userId'";

    if ($conn->query($sql) === TRUE) {
        // Profile updated successfully
        echo "success";
    } else {
        // Handle errors
        echo "Error updating profile: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case where the request method is not POST
    echo "Error: Invalid request method.";
}
?>
