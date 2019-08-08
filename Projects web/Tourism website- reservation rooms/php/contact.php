<?php
    session_start();

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
        $mail->setFrom($_POST['email'], $_POST['name']);

        /* Add a recipient. */
        $mail->addAddress('denissamaria2012@gmail.com', 'Denisa Tudorache');

        /* Set the subject. */
        $mail->Subject = $_POST['subject'];

        /* Set the mail message body. */
        $mail->Body = $_POST['message'];
        
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

    
    header("Location: /contact.php?messageSent=true");

    exit();
?>