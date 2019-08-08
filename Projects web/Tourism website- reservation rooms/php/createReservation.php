<?php
    session_start();

    include_once('dbcon.php');
    $check_in_date = $_POST['check_in_date'] / 1000;
    $check_in_date_formatted = date('d/m/Y', $check_in_date);
    $check_out_date = $_POST['check_out_date'] / 1000;
    $check_out_date_formatted = date('d/m/Y', $check_out_date);
    $users_id = $_POST['users_id'];
    $rooms_id = $_POST['rooms_id'];

    $sql = "select * from users where id=$users_id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $email = $row["email"];
    $full_name = $row["first_name"] . " " . $row["last_name"];

    $sql = "select * from rooms where id=$rooms_id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $room_description = $row["description"];
    $room_number = $row["number"];
    $hotel_id = $row["hotels_id"];

    $sql = "select * from hotels where id=$hotel_id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    $hotel_name = $row["name"];

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

   
    require 'C:\PHPMailer\src\Exception.php';

 
    require 'C:\PHPMailer\src\PHPMailer.php';

  
    require 'C:\PHPMailer\src\SMTP.php';

    $mail = new PHPMailer(TRUE);

   
    try {
        $mail->IsSMTP();

        $mail->Host = "smtp.gmail.com";

       

        $mail->SMTPAuth = true;

        $mail->Username = 'testphpmailerlicenta@gmail.com';

        $mail->Password = 'Testlicenta1#';
        /* Set the mail sender. */
        $mail->setFrom('no-repply@takemeanyware.ro', 'Take me anyware');

        /* Add a recipient. */
        $mail->addAddress($email, $full_name);

        /* Set the subject. */
        $mail->Subject = "Your reservation is here! :-)";

        /* Set the mail message body. */
        $mail->Body = "Buna $full_name <br/><br/>, Iti multumim ca ai ales serviciile noastre! <br/> <br/> Rezervarea ta este urmatoarea: $room_description ($room_number) la $hotel_name.<br/>Check-in: $check_in_date_formatted <br>Check-out: $check_out_date_formatted <br/><br/>Vacanta frumoasa,<br/>Echipa #Takemeanyware <br/><br/> Pentru detalii suplimentare sau pentru orice nelamurire, va stam la dispozitie.";
        
        $mail->IsHTML(true);

        /*  send the mail. */
        $mail->send();
    }
    catch (Exception $e)
    {
    
        echo $e->errorMessage();
    }
    catch (\Exception $e)
    {
      
        echo $e->getMessage();
    }

    $sql = "insert into reservations(check_in_date, check_out_date, users_id, rooms_id) values ($check_in_date, $check_out_date, $users_id, $rooms_id)";
    $result = $con->query($sql);

    if ($result) {
        header("Location: /congrats.php");
    } else {
        header("Location: /facilities.php?reservationOk=false");
    }

    exit();
?>