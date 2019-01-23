
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


//check if form was sent
if($_POST){
  $to = "elitevaldosta@gmail.com";
  $email_bcc = "codobitdev@gmail.com";
	$subject = "Contact Form Submission";
  $name = $_POST["inputName"];
	$email = $_POST["inputEmail"];
	$phone = $_POST["inputPhone"];
  $message = $_POST["inputMessage"];
  

  $content = "Submission to elitelandscapesvaldosta.com" . "\n\n";
  $content .= "Name: " . $name . "\n";
  $content .= "Email: " . $email . "\n";
  $content .= "Phone: " . $phone . "\n\n";
  $content .= "Message: " . $message . "\n";

	//honey pot field
	$honeypot = $_POST["firstname"];
	//check if the honeypot field is filled out. If not, send a mail.
	if( strlen($honeypot) > 0 ){
    echo 'error';
	}else{


    $header = 'From: ' . $name . '<'. $email . '>' . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'BCC: ' . $email_bcc . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($to, $subject, $content, $header);

    // Redirect to a thank you page
    header('Location: ../../thank-you.html');


	}
}


?>