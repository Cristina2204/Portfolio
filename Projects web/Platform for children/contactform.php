<?php

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$mailForm = $_POST['mail'];
	$message = $_POST['message'];

	$mailTo = "cristinagabriela2204@gmail.com";
	$headers = " Form: " .$mailForm;
	$txt = "You have received an e-mail form" .$name.".\n\n".$message;

	mail($mailTo,$subject,$txt,$headers);
	header("Location : contact.php?mailsend");
}
?>