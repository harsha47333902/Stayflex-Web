<?php

function getAllCategories($conn){
    $GetCategories = "SELECT * FROM room";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["roomid"]             = $record["room_id"];
            $data["room_type"]          = $record["room_type"];
            $data["price"]              = $record["price"];
            $data["photo"]              = $record["photo"];
            $data["description"]              = $record["description"];
            
            array_push($ListArray,$data);

        }

    }

    return $ListArray;
}

function getAllBookings($conn, $id){
    $GetCategories = "SELECT * FROM transaction WHERE user = $id";
    $Results    = mysqli_query($conn,$GetCategories);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $data = array();
            $data["checkin"]            = $record["checkin"];
            // $data["checkout"]            = $record["checkout"];

            $data["room_type"]          = "";

            $GetRoomType = "SELECT * FROM room WHERE room_id = '".$record["room_id"]."'";
            $RoomResults    = mysqli_query($conn,$GetRoomType);

            if (mysqli_num_rows($RoomResults) > 0) 
            {
                while($info = mysqli_fetch_assoc($RoomResults)) 
                {
                    $data["room_type"]          = $info["room_type"];;
                }
            }

            $data["room_no"]            = $record["room_no"];
            $data["status"]             = $record["status"];
            array_push($ListArray,$data);
        }

    }

    return $ListArray;
}

function getAvailability($conn, $id){
    $Query = "SELECT COUNT(*) as booked, room.room_type, room.total as available FROM transaction INNER JOIN room ON transaction.room_id = room.room_id WHERE status IN ('Pending','Check In') AND transaction.room_id = $id";
    $Results    = mysqli_query($conn,$Query);
    $ListArray = array();

    if (mysqli_num_rows($Results) > 0) 
    {
        while($record = mysqli_fetch_assoc($Results)) 
        {
            $booked               = (int) $record["booked"];
            $room_type            = $record["room_type"];
            $available            = (int) $record["available"];

            if($booked == '0')
            {
                return true;
            }
            
            if($booked < $available){
                return true;
            }else{
                return false;
            }
          
        }

    }

}



?>