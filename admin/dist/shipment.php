<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="https://js.arcgis.com/4.15/esri/themes/light/main.css">
  <!-- <script src="https://js.arcgis.com/4.15/"></script> -->
    <!-- <script src='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script> -->
    <!-- <script>
    require([
      "esri/Map",
      "esri/views/MapView",
       "esri/widgets/Search"
    ], function(Map, MapView, Search) {

    var map = new Map({
      basemap: "topo-vector"
    });

    var view = new MapView({
      container: "viewDiv",
      map: map,
      center: [-118.80500,34.02700], // longitude, latitude , -118.80500, 34.02700
      zoom: 13
    });

    var search = new Search({
        view: view
      });

    var search1 = new Search({
        view: view
      });

      view.ui.add(search1, "top-right");
      view.ui.add(search, "bottom-right");
  });

</script> -->
<!-- <link href='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' /> -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Logistics - Shipment</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

<style>
body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    /* background: linear-gradient(-45deg, #2196F3 50%, #EEEEEE 50%); */
    background-repeat: no-repeat
}

.card {
    background-color: #FFF;
    border-radius: 25px;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    padding: 40px;
    z-index: 0
}

.heading {
    font-weight: normal
}

.desc {
    font-size: 14px
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey;
    padding-left: 0px
}

#progressbar .active {
    color: #673AB7
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    content: ""
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #E0E0E0;
    border-radius: 50%;
    margin: auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 10px;
    background: #E0E0E0;
    position: absolute;
    left: 0;
    top: 17px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #F9A825
}

.sub-heading {
    font-weight: 500
}

.yellow-text {
    color: #F9A825
}

fieldset.show {
    display: block
}

fieldset {
    display: none
}

.radio {
    display: inline-block;
    border-radius: 0;
    box-sizing: border-box;
    cursor: pointer;
    color: #BDBDBD;
    font-weight: 500;
    -webkit-filter: grayscale(100%);
    -moz-filter: grayscale(100%);
    -o-filter: grayscale(100%);
    -ms-filter: grayscale(100%);
    filter: grayscale(100%)
}

.radio:hover {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.radio.selected {
    border: 1px solid #F9A825;
    box-shadow: 0px 8px 16px 0px #EEEEEE;
    color: #29B6F6 !important;
    -webkit-filter: grayscale(0%);
    -moz-filter: grayscale(0%);
    -o-filter: grayscale(0%);
    -ms-filter: grayscale(0%);
    filter: grayscale(0%)
}

.card-block {
    border: 1px solid #CFD8DC;
    width: 45%;
    margin: 2.5%;
    padding: 20px 25px 15px 25px
}

@media screen and (max-width: 768px) {
    .card-block {
        padding: 20px 20px 0px 20px;
        height: 250px
    }
}

.icon {
    width: 85px;
    height: 100px
}

.image-icon {
    width: 85px;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px
}

select,
input,
textarea,
button {
    padding: 8px 15px 8px 15px;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    background-color: #ECEFF1;
    border: 1px solid #ccc;
    font-size: 16px;
    letter-spacing: 1px
}

select:focus,
input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid skyblue !important;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

textarea {
    height: 100px
}

button {
    width: 120px;
    letter-spacing: 2px
}

.fit-image {
    width: 100%;
    object-fit: cover
}

.btn-block {
    border-radius: 5px;
    height: 50px;
    font-weight: 500;
    cursor: pointer
}

.fa-long-arrow-right {
    float: right;
    margin-top: 4px
}

.fa-long-arrow-left {
    float: left;
    margin-top: 4px
}
</style>
 </head>


    <body>
<?php

       require('db.php');

       if(isset($_POST['submit']))
    {
        $pickup = stripslashes($_REQUEST['pickup']);
        $dropoff = stripslashes($_REQUEST['dropoff']);

        $pickup = mysqli_real_escape_string($con, $pickup);
        $dropoff = mysqli_real_escape_string($con, $dropoff);
        $item_desc = stripslashes($_REQUEST['item_desc']);
        $item_desc = mysqli_real_escape_string($con, $item_desc);
        $receivername = stripslashes($_REQUEST['receiver_name']);
        $receivername = mysqli_real_escape_string($con, $receivername);
        $receiverphone = stripslashes($_REQUEST['receiverphone']);
        $vehicle = stripslashes($_REQUEST['vehicle']);
        $receiverphone = mysqli_real_escape_string($con, $receiverphone);
        $vehicle = mysqli_real_escape_string($con, $vehicle);
        $showordernumber = stripslashes($_REQUEST['ordernumber1']);
        $showordernumber = mysqli_real_escape_string($con, $showordernumber);
        
        $created_datetime = date("Y-m-d H:i:s");
        $query = "INSERT into `shipment_log` (userId, vehicle_type, pickup_loc, dropoff_loc, item_desc, receiver_name, receiver_phone, created_date, orderId, cost, shipment_status)".

                   "VALUES ('2', '$vehicle', '$pickup', '$dropoff', '$item_desc', '$receivername', '$receiverphone', '$created_datetime', '$showordernumber', '2000', 'pending')";
        $result = mysqli_query($con, $query) or die(mysqli_error($con));
        //$result = mysqli_query($con, $query) 
        if($result){
        // header("Location: listshipments.php"); exit;
        }
              
    }
?>


        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            >
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Static Navigation</a><a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a></nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts</a
                            ><a class="nav-link" href="tables.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Static Navigation</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Shipment</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center ">
        <div class="col-xl-5 col-lg-6 col-md-7">
            <div class="card b-0">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h3 class="heading">Create Shipment</h3>
                <!-- <p class="desc">Fill out the form or call <span class="yellow-text">123 456 7891</span><br>to start protecting your business today!</p> -->
                <ul id="progressbar" class="text-center">
                    <li class="active step0" id="step1"></li>
                    <li class="step0" id="step2"></li>
                    <li class="step0" id="step3"></li>
                </ul>
                <fieldset class="show">
                    <div class="form-card">
                        <h5 class="sub-heading">Select Vehicle</h5>
                        <div class="row px-1 radio-group">
                            <div class="card-block text-center radio">
                                <div class="image-icon"> <i class="fas fa-bus fa-5x"></i> <input type="radio" name="vehicle" value="Van" onchange="showdetails()"> </div>
                                <p class="sub-desc">Van</p>
                            </div>
                            <div class="card-block text-center radio">
                                <div class="image-icon"> <i class="fas fa-truck-moving fa-5x"></i><input type="radio" name="vehicle"  value="Truck" onchange="showdetails()"> </div>
                                <p class="sub-desc">Truck</p>
                            </div>
                            <div class="card-block text-center radio">
                                <div class="image-icon"> <i class="fas fa-truck fa-5x"></i></i> <input type="radio" name="vehicle" value="Mini Truck" onchange="showdetails()"> </div>
                                <p class="sub-desc">Mini Truck</p>
                            </div>
                            <div class="card-block text-center radio">
                                <div class="image-icon"> <i class="fas fa-motorcycle fa-5x"></i> <input type="radio" name="vehicle" value="Bike" onchange="showdetails()"> </div>
                                <p class="sub-desc">Motor Bike</p>
                            </div>
                        </div> <input type="button" id="next1" class="btn-block btn-primary mt-3 mb-1 next" value="NEXT &rarr;">
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-card">
                        <h5 class="sub-heading mb-4">Where Do You Want Us Pick Up Your Item(s)</h5> <label class="text-danger mb-3">Required *</label>
                        <div class="form-group"> <label class="form-control-label">Pickup Location * :</label> <input type="text" id="pickup" name="pickup" placeholder="Pick Up Location" class="form-control" onblur="validate1(1)" onchange="showdetails()"> </div>
                        <div class="form-group"> <label class="form-control-label">Dropoff Location * :</label> <input type="text" id="dropoff" name="dropoff" placeholder="Drop Off Location" class="form-control" onblur="validate1(2)" onchange="showdetails()"> </div>
                        <div class="form-group"> <label class="form-control-label">Item Description * :</label> <textarea type="text" id="item_desc" name="item_desc" rows="5" placeholder="Item Description" class="form-control" onblur="validate1(3)" onchange="showdetails()"></textarea> </div>
                        <div class="form-group"> <label class="form-control-label">Receiver's Full Name * :</label> <input type="text" id="receiver_name" name="receiver_name" placeholder="Receiver's Full Name" class="form-control" onblur="validate1(4)" onchange="showdetails()"> </div>
                        <div class="form-group"> <label class="form-control-label">Receiver's Phone No. * :</label> <input type="text" id="receiverphone" name="receiverphone" placeholder="08012345678" class="form-control" onblur="validate1(5)" onchange="showdetails()"> </div>
                        <!-- <button id="next2" class="btn-block btn-primary mt-3 mb-1 next mt-4" onclick="validate1(0)">NEXT<span class="fas fa-long-arrow-alt-right"></span></button> <button class="btn-block btn-secondary mt-3 mb-1 prev"><span class="fas fa-long-arrow-alt-left"></span>PREVIOUS</button> -->
                        <input id="next2" name="next2" class="btn-block btn-primary mt-3 mb-1 next mt-4" value="NEXT &rarr;" onclick="validate1(0)"/> <input type="button" class="btn-block btn-secondary mt-3 mb-1 prev" value="&larr; PREVIOUS">
                    </div>
                </fieldset>
                <div id='map' style='width: 400px; height: 300px;'></div>

                <fieldset>
                    <div class="form-card">
                        <div id="viewDiv"></div>
                        <h5 class="sub-heading mb-4">Your Shipment Details</h5> 
                        <div class="form-group"> <label class="form-control-label" style="font-weight: bold;">Receiver Name :</label> <span  id="showreceivername"></span> </div>
                        <div class="form-group"> <label class="form-control-label" style="font-weight: bold;">Receiver Phone Number :</label> <span  id="showreceiverphone"></span> </div>
                        <div class="form-group"> <label class="form-control-label" style="font-weight: bold;">Pickup Location :</label> <span  id="showpickuploc"></span> </div>
                        <div class="form-group"> <label class="form-control-label" style="font-weight: bold;">Dropoff Location :</label> <span  id="showdropoffloc"></span> </div>
                        <div class="form-group"> <label class="form-control-label" style="font-weight: bold;">Item Description :</label> <span  id="showitemdesc"></span></div> 
                        <div class="form-group"> <label class="form-control-label" style="font-weight: bold;">Vehicle Type :</label> <span  id="showvehicletype"></span></div> 
                        <div class="form-group"> <label class="form-control-label" style="font-weight: bold;">Cost :</label> <span  id="showamount"></span> <?php echo '1550'; ?></div> 
                        <div class="form-group"> <label class="form-control-label" style="font-weight: bold;">Order Number :</label> <span  id="showordernumber" name="showordernumber">
                        <?Php
function random_generator($digits){
srand ((double) microtime() * 10000000);
//Array of alphabets
$input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
"R","S","T","U","V","W","X","Y","Z");

$random_generator="";// Initialize the string to store random numbers
for($i=1;$i<=$digits;$i++){ // Loop the number of times of required digits

if(rand(1,2) == 1){// to decide the digit should be numeric or alphabet
// Add one random alphabet 
$rand_index = array_rand($input);
$random_generator .=$input[$rand_index]; // One char is added

}else{

// Add one numeric digit between 1 and 10
$random_generator .=rand(1,10); // one number is added
} // end of if else

} // end of for loop 


return $random_generator;
} // end of function

$ordernumber = random_generator(10);
echo $ordernumber;
echo "<input type='hidden' name='ordernumber1' value='$ordernumber' />";
?>
</span>
<!-- <input type="hidden" name="ordernumber1" value="<?php if(isset($ordernumber)){echo $ordernumber;} ?>" /> -->
</div> 
                        <input type="submit" name="submit" id="next3" class="btn-block btn-primary mt-3 mb-1 next mt-4" value="SUBMIT REQUEST"> <input type="button" class="btn-block btn-secondary mt-3 mb-1 prev" value="&larr; PREVIOUS">
                    </div>
                </fieldset>
               
                <fieldset>
                    <div class="form-card">
                        <h5 class="sub-heading mb-4">Success!</h5>
                        <p class="message">Thank You for choosing our website.<br>Quotation will be sent to your Email ID and Contact Number.</p>
                        <div class="check"> <img class="fit-image check-img" src="https://i.imgur.com/QH6Zd6Y.gif"> </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
                            </div>

                        </div>
                        <div style="height: 100vh;"></div>
                     
                    </div>
    </form>
                </main>
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
        <script type='text/javascript'>
function validate1(val) {
v1 = document.getElementById("pickup");
v2 = document.getElementById("dropoff");
v3 = document.getElementById("item_desc");
v4 = document.getElementById("receiver_name");
v5 = document.getElementById("receiverphone");

flag1 = true;
flag2 = true;
flag3 = true;
flag4 = true;
flag5 = true;

if(val>=1 || val==0) {
if(v1.value == "") {
v1.style.borderColor = "red";
flag1 = false;
}
else {
v1.style.borderColor = "green";
flag1 = true;
}
}

if(val>=2 || val==0) {
if(v2.value == "") {
v2.style.borderColor = "red";
flag2 = false;
}
else {
v2.style.borderColor = "green";
flag2 = true;
}
}

if(val>=3 || val==0) {
if(v3.value == "") {
v3.style.borderColor = "red";
flag3 = false;
}
else {
v3.style.borderColor = "green";
flag3 = true;
}
}

if(val>=4 || val==0) {
if(v4.value == "") {
v4.style.borderColor = "red";
flag4 = false;
}
else {
v4.style.borderColor = "green";
flag4 = true;
}
}

if(val>=5 || val==0) {
if(v5.value == "") {
v5.style.borderColor = "red";
flag4 = false;
}
else {
v5.style.borderColor = "green";
flag5 = true;
}
}

flag = flag1 && flag2 && flag3 && flag4 && flag5;
showdetails();
return flag;
}

function showdetails()
{
    v1 = document.getElementById("pickup").value;
    v2 = document.getElementById("dropoff").value;
    v3 = document.getElementById("item_desc").value;
    v4 = document.getElementById("receiver_name").value;
    v5 = document.getElementById("receiverphone").value;
    v6 = document.getElementsByName('vehicle');
    for(i = 0; i < v6.length; i++)
    {
        sumdetail6 = document.getElementById("showvehicletype");
        if(v6[i].checked)
        {
          sumdetail6.innerHTML = v6[i].value;
        }
       
    }

    sumdetail1 = document.getElementById("showreceivername");
    sumdetail2 = document.getElementById("showreceiverphone");
    sumdetail3 = document.getElementById("showpickuploc");
    sumdetail4 = document.getElementById("showdropoffloc");
    sumdetail5 = document.getElementById("showitemdesc");
    

    sumdetail1.innerHTML = v4;
    sumdetail2.innerHTML = v5;
    sumdetail3.innerHTML = v1;
    sumdetail4.innerHTML = v2;
    sumdetail5.innerHTML = v3;

    //console.log(v1, v2);
}

// function validate2(val) {
// v1 = document.getElementById("cname");
// v2 = document.getElementById("zip");
// v3 = document.getElementById("state");
// v4 = document.getElementById("city");

// flag1 = true;
// flag2 = true;
// flag3 = true;
// flag4 = true;

// if(val>=1 || val==0) {
// if(v1.value == "") {
// v1.style.borderColor = "red";
// flag1 = false;
// }
// else {
// v1.style.borderColor = "green";
// flag1 = true;
// }
// }

// if(val>=2 || val==0) {
// if(v2.value == "") {
// v2.style.borderColor = "red";
// flag2 = false;
// }
// else {
// v2.style.borderColor = "green";
// flag2 = true;
// }
// }

// if(val>=3 || val==0) {
// if(v3.value == "") {
// v3.style.borderColor = "red";
// flag3 = false;
// }
// else {
// v3.style.borderColor = "green";
// flag3 = true;
// }
// }

// if(val>=4 || val==0) {
// if(v4.value == "") {
// v4.style.borderColor = "red";
// flag4 = false;
// }
// else {
// v4.style.borderColor = "green";
// flag4 = true;
// }
// }

// flag = flag1 && flag2 && flag3 && flag4;

// return flag;
// }

$(document).ready(function(){

var current_fs, next_fs, previous_fs;

$(".next").click(function(){

str1 = "next1";
str2 = "next2";
//str3 = "next3";

if(!str2.localeCompare($(this).attr('id')) && validate1(0) == true) {
val2 = true;
}
else {
val2 = false;
}



if(!str1.localeCompare($(this).attr('id')) || (!str2.localeCompare($(this).attr('id')) && val2 == true)) {
current_fs = $(this).parent().parent();
next_fs = $(this).parent().parent().next();

$(current_fs).removeClass("show");
$(next_fs).addClass("show");

$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

current_fs.animate({}, {
step: function() {

current_fs.css({
'display': 'none',
'position': 'relative'
});

next_fs.css({
'display': 'block'
});
}
});
}
});

$(".prev").click(function(){

current_fs = $(this).parent().parent();
previous_fs = $(this).parent().parent().prev();

$(current_fs).removeClass("show");
$(previous_fs).addClass("show");

$("#progressbar li").eq($("fieldset").index(next_fs)).removeClass("active");

current_fs.animate({}, {
step: function() {

current_fs.css({
'display': 'none',
'position': 'relative'
});

previous_fs.css({
'display': 'block'
});
}
});
});

$('.radio-group .radio').click(function(){
$(this).toggleClass('selected');
});

});</script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
