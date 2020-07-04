<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost:8080/rest-api-authentication/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/user.php';
 
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

    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."activate.php?email=". $data->email ;
    $toEmail = $data->email;
    $subject = "User Registration Activation Email";
    $content = "Click this link to activate your account. <a href='" . $actual_link . "'>" . $actual_link . "</a>";
    $mailHeaders = "From: Admin\r\n";
    if(mail($toEmail, $subject, $content, $mailHeaders)) {
        $message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account, thank you.";	
        $type = "success";
    }
    else {
        $message = "Problem in registration. Try Again!";	
    }
 
    // display message: user was created
    echo json_encode(array("message" => "User was created."));
            
}
 
// message if unable to create user
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "Unable to create user. Email Already Exists"));
}

?>