<?php
include "../includes/config.php";

$ResponseArray 	= 	array();
$ErrorResponse  =    "";
$Action			=	stripslashes(trim($_REQUEST["action"]));
$HtmlContent    =    "";

if(isset($Action) && $Action == "login"){
    try {
        $email = strtolower(addslashes(trim($_REQUEST['email'])));
        $password = addslashes(trim($_REQUEST['password']));

        $CheckUserQuery = "SELECT * FROM user WHERE email = '$email' AND password ='$password'";
        $CheckUserQueryResults = mysqli_query($conn, $CheckUserQuery);

        if (mysqli_num_rows($CheckUserQueryResults) > 0) {
            while($record = mysqli_fetch_assoc($CheckUserQueryResults)) {
                $_SESSION["user_logged_in"] =  true;
                $_SESSION["uid"] =  $record["id"];
                $_SESSION["user_name"] =  $record["username"];
                $_SESSION["user_email"] =  $record["email"];

                $ResponseArray["status"] = "200";
                $ResponseArray["message"] = "Login Successful.";
            }
        } else {
            $ResponseArray["status"] = "300";
            $ResponseArray["message"] = "Incorrect username or password.";
        }

    } catch (Exception $ex) {
        $ResponseArray["status"] = "500";
        $ResponseArray["message"] = $ex->getMessage();
    }
}
else if(isset($Action) && $Action == "register"){

    try {
        $username	= strtolower(addslashes((trim($_REQUEST['regusername']))));
        $email	    = strtolower(addslashes((trim($_REQUEST['reguseremail']))));

        if(empty($_REQUEST['regpassword'])) {
            throw new Exception("Password is required.");
        }
        $password	= addslashes((trim($_REQUEST['regpassword'])));


        if(empty($_REQUEST['regmobile'])) {
            throw new Exception("Mobile number is required.");
        } elseif (!preg_match('/^\d{10}$/', $_REQUEST['regmobile'])) {
            throw new Exception("Mobile number must be exactly 10 digits long.");
        }
        $mobile	= addslashes((trim($_REQUEST['regmobile'])));
       

        $CheckEmailQuery = "SELECT * FROM user WHERE email = '$email'";
        $CheckEmailQueryResults = mysqli_query($conn,$CheckEmailQuery);
        if (mysqli_num_rows($CheckEmailQueryResults) > 0) 
        {
            $ResponseArray["status"]  = "300";
            $ResponseArray["message"] = "Email is already registered. Please provide different email.";
        }else{
            $LoginArray = array();
            $LoginArray["username"]      = $username;
            $LoginArray["email"]         = $email;
            $LoginArray["password"]      = $password;
            $LoginArray["mobile"]      = $mobile;
            

          //  $password_hash = password_hash($password,PASSWORD_DEFAULT); 

           // $LoginArray["password"]      = $password_hash;
           // $LoginArray["usertype"]         = 'user';

        
            $columns = implode(", ",array_keys($LoginArray));
            $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($LoginArray));
            $values  = implode("', '", $escaped_values);
            $AddNewUserQuery = "INSERT INTO user ($columns) VALUES ('$values')";
            $ExecuteAddNewUserQuery = mysqli_query($conn,$AddNewUserQuery) or die ("Error in query: $AddNewUserQuery. ".mysqli_error($conn));
            
            $ResponseArray["status"]  = "200";
            $ResponseArray["message"] = "Registration Successfull.";
        }

        

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}else if(isset($Action) && $Action == "book"){

    try {

       

        $room_id	    = strtolower(addslashes((trim($_REQUEST['room_id']))));
        if(empty($_REQUEST['first_name'])) {
            throw new Exception("First name is required.");
        }

        $first_name	    = strtolower(addslashes((trim($_REQUEST['first_name']))));
        // $middle_name	= addslashes((trim($_REQUEST['middle_name'])));

        if(empty($_REQUEST['adult']) || !is_numeric($_REQUEST['adult'])) {
            throw new Exception("Number of adults is required and must be numeric.");
        }

        $adult	    = strtolower(addslashes((trim($_REQUEST['adult']))));

        if(!isset($_REQUEST['children']) || !is_numeric($_REQUEST['children'])) {
            throw new Exception("Number of children is required and must be numeric.");
        }
        $child	    = strtolower(addslashes((trim($_REQUEST['children']))));

        if(empty($_REQUEST['last_name'])) {
            throw new Exception("Last name is required.");
        }
        $last_name	    = addslashes((trim($_REQUEST['last_name'])));

        if(empty($_REQUEST['address'])) {
            throw new Exception("Address is required.");
        }
        $address	    = addslashes((trim($_REQUEST['address'])));

        if(empty($_REQUEST['mobile'])) {
            throw new Exception("Mobile number is required.");
        } elseif (!preg_match('/^\d{10}$/', $_REQUEST['mobile'])) {
            throw new Exception("Mobile number must be exactly 10 digits long.");
        }
        $mobile	        = addslashes((trim($_REQUEST['mobile'])));


        if(empty($_REQUEST['date'])) {
            throw new Exception("Check-in date is required.");
        }
        $date	        = addslashes((trim($_REQUEST['date'])));

        if(empty($_REQUEST['outdate'])) {
            throw new Exception("Check-out date is required.");
        }
        $outdate	        = addslashes((trim($_REQUEST['outdate'])));

        $GuestArray = array();
        $GuestArray["user"]           = $_SESSION["uid"];
        $GuestArray["firstname"]      = $first_name;
        // $GuestArray["middlename"]     = $middle_n
        $GuestArray["adult"]      = $adult;
        $GuestArray["child"]      = $child;
        $GuestArray["lastname"]       = $last_name;
        $GuestArray["address"]        = $address;
        $GuestArray["contactno"]      = $mobile;

        $columns = implode(", ",array_keys($GuestArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($GuestArray));
        $values  = implode("', '", $escaped_values);
        $AddGuest = "INSERT INTO guest ($columns) VALUES ('$values')";
        $ExecuteQuery = mysqli_query($conn,$AddGuest) or die ("Error in query: $AddGuest. ".mysqli_error($conn));

        $TransArray = array();
        $TransArray["guest_id"]       = mysqli_insert_id($conn);
        $TransArray["user"]           = $_SESSION["uid"];
        $TransArray["room_id"]        = $room_id;
        $TransArray["checkin"]        = $date;
        $TransArray["checkout"]        = $outdate;
        
        $TransArray["status"]         = "Pending";


        $columns = implode(", ",array_keys($TransArray));
        $escaped_values = array_map(array($conn, 'real_escape_string'), array_values($TransArray));
        $values  = implode("', '", $escaped_values);
        $AddTrans = "INSERT INTO transaction ($columns) VALUES ('$values')";
        $ExecuteQuery = mysqli_query($conn,$AddTrans) or die ("Error in query: $AddTrans. ".mysqli_error($conn));

        $ResponseArray["status"]  = "200";
        $ResponseArray["message"] = "Registration Successfull.";

    } catch (Exception $ex) {
        $ResponseArray["status"]  = "500";
        $ResponseArray["message"] = $ex->getMessage();
        // echo $ex->getMessage();
    }
   
}



$Response	=	json_encode($ResponseArray, true);

echo $Response;
exit;

?>