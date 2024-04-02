<?php
include "includes/header.php";
include "includes/functions.php";

$Bookings = "";

if(isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"] == true){ 
    $Bookings = getAllBookings($conn, $_SESSION["uid"]);

}
?>

<style>
    
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>
</head>
<body>

    <div class="container">
        <table id="bookingTable">
            <tr>
                <th>Date</th>
                <th>Roome Type</th>
                <th>Room Number</th>
                <th>Status</th>
            </tr>
            <?php
                if(isset($_SESSION["user_logged_in"]) && $_SESSION["user_logged_in"] == true)
                { 
                    foreach ($Bookings as $value) 
                    {
                        echo ' <tr>
                        <td>'.$value["checkin"].'</td>
                        <td>'.$value["room_type"].'</td>
                        <td>'.$value["room_no"].'</td>
                        <td>'.$value["status"] .'</td>
                        </tr>';
                    }
                }
            ?>
        </table>
    </div>

    <script>
        // JavaScript to fetch and populate the booking history table
        // (as shown in the previous example)
    </script>
</body>
</html>
