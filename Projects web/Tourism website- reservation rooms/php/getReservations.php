<?php

    function getReservations() {
        session_start();
        include_once('dbcon.php');

        $user_id = $_SESSION["user"];
        $reservations = array();

        $sql = "select reservations.check_in_date as check_in_date, reservations.check_out_date as check_out_date, rooms.hotels_id as hotel_id, rooms.id as rooms_id, rooms.number as room_number, rooms.description as room_description from reservations inner join rooms on reservations.rooms_id=rooms.id where reservations.users_id=$user_id";
        $result = $con->query($sql);        
        
        while ($row = $result->fetch_assoc()) {
            $hotel_id = $row["hotel_id"];
            $sql_hotel = "select * from hotels where id=$hotel_id";
            $result_hotel = $con->query($sql_hotel);
            $row_hotel = $result_hotel->fetch_assoc();
            $images = explode(",", $row_hotel["image"]);
            $row_hotel["image"] = $images[0];
            $row["hotel"] = $row_hotel;

            $reservations[] = $row;
        }

        return $reservations;
    }
?>