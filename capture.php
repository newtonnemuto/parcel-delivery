<?php
// resume session  
session_start(); 
 
//get capture input
$capture = $_POST['hidden'];

if ($capture === null) {
    echo "Not submitted or the value is invalid.";
} else {
    if ($capture === "img1,img6,img8" ||$capture === "img1,img8,img6" || $capture === "img6,img8,img1"
    || $capture === "img6,img1,img8" || $capture === "img8,img6,img1" || $capture === "img8,img1,img6") {
         $role=$_SESSION['role'];
         switch ($role){
            case "client":
            header("location:clientsDashboard.php");
            break;
            case "driver":
            header("location:driversDashboard.php");
            break;
            case "customerCare":
            header("location:customercareDashboard.php");
            break;
            case "admin":
            header("location:AdminDashboard.php");
            break;  
            default:
            header("location:home.html");
            }
  
    } else {
        echo "Condition not met.<a href='capture.html'>try again</a>" ;
    }
}
      