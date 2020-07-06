<?php
$con = mysqli_connect("localhost", "root", "", "logistic_co");
if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();
}
?>