<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// echo "start\r\n";

// if (empty($_POST['submit'])) {
//     echo "Form is not submitted!";
//     exit;
// }

// if (empty($_POST["fname"]) || empty($_POST["lname"])) {
//     echo "Please fill the form";
//     exit;
// }

$name = $_POST["inputName"];
$email = $_POST["inputEmail"];
$phone = $_POST["inputPhone"];
$content = $_POST['inputTextArea'];

$to = "elitevaldosta@gmail.com";

$subject = "New Form Submission to Elite Landscapes!";

// $message = $fname+" "+$lname+"\n"
//     +$email+"\n"+$phone;

$message = "You have a new submission to elitelandscapes.com!
    \r\nName: $name
    \r\nEmail: $email
    \r\nPhone: $phone
    \r\nMessage: $content";

// echo '<script>console.log("' . $message . '")</script>';
echo $message;

// In case any of our lines are larger than 70 characters, we should use wordwrap()
// $message = wordwrap($message, 70, "\r\n");

$headers = 'From: max.carter@codobit.com' . "\r\n" .
'Reply-To: max.carter@codobit.com' . "\r\n" .
'BCC: codobitdev@gmail.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

// Send
mail($to, $subject, $message, $headers);

// Redirect to a thank you page
header('Location: ./thank-you.html');
