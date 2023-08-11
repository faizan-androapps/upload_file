<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Load Composer's autoloader
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

$mail->SMTPDebug = 0;
$mail->Host = "mail.turkeytourpackages.in.net";

$mail->Port = 465;
$mail->IsHTML(true);

//Set who the message is to be sent from
$mail->setFrom('info@turkeytourpackages.in.net', 'seventhsky');

//Set an alternative reply-to address
// $mail->addReplyTo('replyto@gmail.com', 'Secure Developer');

//Set who the message is to be sent to
$mail->addAddress('ahmed@seventhskyholidays.com', 'seventhsky');
$mail->addAddress('sanjaresolutions@gmail.com', 'farzana mam');
$mail->addAddress('mirzafaizan1931@gmail.com', 'faizan');/**/


//Set the subject line
$mail->Subject = 'Contact form submitted data.';
//Read an HTML message body from an external file, convert referenced images to embedded,

//convert HTML into a basic plain-text alternative body
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'];
    $contact = $_POST['phone'];
    $location = $_POST['email'];
    $course = $_POST['message'];

    // $message="$_POST[message]";
    var_dump($name);
    var_dump($contact);
    var_dump($location);
    var_dump($course);

    $html = "  
    <br>
            Contact us Mail From turkeytourpackages.in.net contact form<br><br>
            Name: $name<br>
            Contact Number: $contact<br>
            Location: $location <br>
            Message: $course";
    // $msgHtml = "$name $experience $contact $email $message";

  
  
   // die('i m here');
        // die("Contact us Mail From $email_to[$location] livewiresmediainstitute Courses $name | $contact | $course");
        //case of sucess
        $curl = curl_init();
            // die($course);
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://sanjarcrm.com/api/leads/submit',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'contact' => $contact,
                // 'location' => $location,
                'message' => $course,
                'email' => $location,
                'extra' => 'turkeytourpackages.in.net',
                'table_alias' => 'southafricatours_in_',
                'api_key' => '6bc07f5fd92c6aa737a64e005458e347',
            )
            ));
  
  
  
    $mail->msgHTML($html);
}
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';


// add attachment

// if ($_POST) {
//     // die($_POST);
//     $path = 'upload/' . $_FILES["resume"]["name"];
//     move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
//     // var_dump($_POST);
//     var_dump($path);


//     $mail->AddAttachment($path);
//     var_dump($path,$name,$experience,$contact,$email,$message);
//     // die('$name');
// }


// send the message, check for errors
if (!$mail->send()) {
        // echo ' <script language="javascript"> window.location.href = "https://turkeytourpackages.in.net/"; </script>';
    // die(' i m here');
    // die('email send');
} else {
        echo ' <script language="javascript"> window.location.href = "https://turkeytourpackages.in.net/"; </script>';
    // die('not send');
}
