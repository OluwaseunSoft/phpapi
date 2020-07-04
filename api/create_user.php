<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// //require 'C:\wamp64\composer\vendor\autoload.php';
// require 'C:\wamp64\composer\vendor\phpmailer\phpmailer\src\Exception.php';
// require 'C:\wamp64\composer\vendor\phpmailer\phpmailer\src\PHPMailer.php';
// require 'C:\wamp64\composer\vendor\phpmailer\phpmailer\src\SMTP.php';

// required headers
header("Access-Control-Allow-Origin: http://localhost:8080/rest-api-authentication/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/user.php';

//$mail = new PHPMailer();
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$user = new User($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$user->firstname = $data->firstname;
$user->lastname = $data->lastname;
$user->email = $data->email;
$email_exists = $user->emailForFreshUser();
$user->password = $data->password;
$user->phone_number = $data->phone_number;
$user->role = $data->role;
//$user->status_ind = $data->status_ind;

    
if( !$email_exists &&
    !empty($user->firstname) &&
    !empty($user->email) &&
    !empty($user->password) &&
    $user->create()
){
 
    // set response code
    http_response_code(200);

   // try{

    ini_set('SMTP', 'localhost');
    ini_set('smtp_port', '25');
    ini_set('sendmail_from', 'pitasonandsmartpro@gmail.com');

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."activate.php?email=". $data->email ;
    $toEmail = $data->email;
    $subject = "User Registration Activation Email";
    $content = "Click this link to activate your account". "<a href='" . $actual_link . "'>" . $actual_link . "</a>";
    $mailHeaders = "From: Admin\r\n";
    if(mail($toEmail, $subject, $content, $mailHeaders, $headers)) {
        $message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account, thank you.";	
        $type = "success";
    }
    else {
        $message = "Problem in registration. Try Again!";	
    }
 
    // display message: user was created
    echo json_encode(array("message" => "User was created."));

//     /* Open the try/catch block. */

//     /* Set the mail sender. */
//     $mail->setFrom('pitasonandsmartpro@gmail.com', 'Logistics Admin');
 
//     /* Add a recipient. */
//     $mail->addAddress($data->email, $data->firstname);
 
//     /* Set the subject. */
//     $mail->Subject = 'Welcome';
 
//     /* Set the mail message body. */
//     $mail->Body = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
        

//     /* SMTP parameters. */
   
//    /* Tells PHPMailer to use SMTP. */
//    $mail->isSMTP();
   
//    /* SMTP server address. */
//    $mail->Host = 'smtp.gmail.com';

//    /* Use SMTP authentication. */
//    $mail->SMTPAuth = TRUE;
   
//    /* Set the encryption system. */
//    $mail->SMTPSecure = 'tls';
   
//    /* SMTP authentication username. */
//    $mail->Username = 'pitasonandsmartpro@gmail.com';
   
//    /* SMTP authentication password. */
//    $mail->Password = 'p&s@12345678';
   
//    /* Set the SMTP port. */
//    $mail->Port = 587;
//     /* Finally send the mail. */
//     $mail->send();
//     }
//     catch (Exception $e)
// {
//    echo $e->errorMessage();
// }
// catch (\Exception $e)
// {
//    echo $e->getMessage();
// }
            
}
 
// message if unable to create user
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "Unable to create user. Email Already Exists"));
}

?>