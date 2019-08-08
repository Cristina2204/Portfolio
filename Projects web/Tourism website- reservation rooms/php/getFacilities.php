<?php

    function getFacilities($check_in_date, $check_out_date, $capacity, $country, $town) {
        error_reporting(0);
        include_once('dbcon.php');

        $select_reservations = "select reservations.rooms_id from reservations";

        if ($check_in_date && $check_out_date) {
            $select_reservations += " where (reservations.check_in_date >= $check_in_date AND reservations.check_in_date <= $check_out_date) OR (reservations.check_out_date >= $check_in_date AND reservatons.check_out_date <= $check_out_date)";
        }

        $sql = "select count(rooms.id) as number_of_rooms, min(rooms.id) as room_id, min(rooms.price) as min_price, hotels.id as hotel_id, hotels.name, hotels.country, hotels.town, hotels.image from rooms inner join hotels on rooms.hotels_id=hotels.id where rooms.id not in ($select_reservations)";
        
        if (!is_null($capacity)) {
            $sql .= " and rooms.capacity=$capacity";
        }
        if (!is_null($country)) {
            $country = strtolower($country);
            $sql .= " and LOWER(hotels.country) LIKE '%$country%'";
        }
        if (!is_null($town)) {
            $town = strtolower($town);
            $sql .= " and LOWER(hotels.town) LIKE '%$town%'";
        }
        
        $sql .= " group by hotels.id";
        if ($check_in_date && $check_out_date) {
            // nothing to do
        } else {
            $sql .= " limit 6";
        }
        $result = $con->query($sql);
        
        $facilities = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $row["image"] = explode(",", $row["image"]);
                $facilities[] = $row;
            }
        }

        return $facilities;
    }
    
?>