<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="bg-light" >
    <?php
    if($_SERVER["QUERY_STRING"] != null)
    {
        $querystring = array();
        parse_str($_SERVER["QUERY_STRING"], $querystring);
        //echo $querystring['status']; exit;
        if($querystring['status'] == 'failed')
        {
            $value1 = "<div class='alert alert-danger' role='alert'>
            Wrong Email Address/ Password!
          </div>";
         // exit;
        }
    }
    //require('db.php');
    include_once 'api/objects/user.php';
    include_once 'api/config/database.php';
    session_start();

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // instantiate user object
    $user = new User($db);
 
// get posted data
    $data = json_decode(file_get_contents("php://input"));

    
    // set product property values
$user->email = $data->email;
$email_exists = $user->emailExists();
 
// generate json web token
include_once 'api/config/core.php';
include_once 'api/libs/php-jwt-master/src/BeforeValidException.php';
include_once 'api/libs/php-jwt-master/src/ExpiredException.php';
include_once 'api/libs/php-jwt-master/src/SignatureInvalidException.php';
include_once 'api/libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;
 
// check if email exists and if password is correct
if($email_exists && password_verify($data->password, $user->password)){
 
    $token = array(
       "iss" => $iss,
       "aud" => $aud,
       "iat" => $iat,
       "nbf" => $nbf,
       "data" => array(
           "id" => $user->id,
           "firstname" => $user->firstname,
           "lastname" => $user->lastname,
           "email" => $user->email,
           "status_ind" => $user->status_ind
       )
    );
 
    // set response code
    http_response_code(200);
 
    // generate jwt
    $jwt = JWT::encode($token, $key);
    echo json_encode(
            array(
                "message" => "Successful login.",
                "jwt" => $jwt
            )
        );
 
}
else{
 
    // set response code
    http_response_code(401);
 
    // tell the user login failed
    echo json_encode(array("message" => "Login failed."));
}

    // if(isset($_POST['email']))
    // {
    //     $email = stripslashes($_REQUEST['email']);
    //     $email = mysqli_real_escape_string($con, $email);
    //     $password = stripslashes($_REQUEST['password']);
    //     $password = mysqli_real_escape_string($con, $password);

    //     $query = "SELECT * FROM `logistic_users` WHERE email = '$email' AND password = '".md5($password)."'";
    //     $result = mysqli_query($con, $query) or die(mysqli_error($con));
    //     $rows = mysqli_num_rows($result);
    //     if($rows == 1) {
    //         $_SESSION['username'] = $email;
    //         header("Location: index.php");
    //     }else
    //     {
    //         header("Location: login.php?status="."failed");
            
    //     }
    // }
    ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header" ><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form class="form" method="post" name="login">
                                        <label> <?php if($_SERVER["QUERY_STRING"] != null){echo $value1;} ?></label>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" required /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" required /></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="password.html">Forgot Password?</a><input class="btn btn-primary" type="submit" name="submit" value="Login"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
