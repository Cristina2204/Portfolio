<?php

    function getHotel($hotel_id) {
        include_once('dbcon.php');

        $sql = "select * from hotels where id=$hotel_id";
        $result = $con->query($sql);
        $hotel = $result->fetch_assoc();
        
        $sql = "select * from rooms where hotels_id=$hotel_id";
        $result = $con->query($sql);
        $rooms = array();
        while ($row = $result->fetch_assoc()) {
            $rooms[] = $row;
        }

        $hotel["image"] = explode(",", $hotel["image"]);
        $hotel["rooms"] = $rooms;

        return $hotel;
    }
?>