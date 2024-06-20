<?php 
// Start a session to manage user
session_start();
//estalish connnection 
$servername="localhost";
$username="Newton";
$password="database@123";
$dbname="parceldelivery";
$conn=new mysqli($servername,$username,$password,$dbname);// using the php new mysqli function to establish a connection.

/* Check if the connection to the database was successful usinh connect_error if there is an connect_error the error will be 
displayed and execution will be terminited by the die function. */
 if ($conn->connect_error)  {
  
    die ("connection failled:". $conn->connect_error); // Terminate script execution if the connection fails
}
   
// process  form data from the post request and set the collected data to php variable for use in the php script
         
      $orderId=$_POST['orderId'];
      $TimeTaken=$_POST['TimeTaken'];
      $Route=$_POST['Route'];
      $receiverCode=$_POST['receiverCode']; 
      $deliveryState=$_POST['deliveryState'];
         


      $userId=$_SESSION['userId'];
//get vehicleId from vehicle
$sqlGetVehicleId="select vehicleId from vehicle where driverId=$userId";
$resultVehicleId=$conn->query($sqlGetVehicleId);
if ($resultVehicleId->num_rows > 0) {
    $rowVehicleId = $resultVehicleId->fetch_assoc();
    $vehicleId = $rowVehicleId['vehicleId'];
   // check if the ordercode generate and order Code provided by the match
     $sql="select itemid,orderCode from item where itemid=$orderId";
     $resultSql=$conn->query($sql);
     $rowresultSql=$resultSql->fetch_assoc();
     if($rowresultSql){
     $ordercodeItemid=$rowresultSql['itemid'];
     $receiverCodeOrderCode=$rowresultSql['orderCode'];
     if($ordercodeItemid===$orderId && $receiverCodeOrderCode===$receiverCode){ 

     // check if the order is marked
     $sqlmarked="select * from item where vehicleId=$vehicleId 
     and paymentDetail='paid' and deliveryState is NULL";
     $resultSqlmarked=$conn->query($sqlmarked);
      
     if($resultSqlmarked->num_rows>0){ 
     //insert data into database using prepares statement
    $sqlupdate="UPDATE item SET deliveryState=?,timeTaken=?,route=?  
     where vehicleId=? and itemid=?";
    $stmt=$conn->prepare($sqlupdate);
    //The bind_param() method binds variables to the placeholders in the SQL query.
    $stmt->bind_param("sssii",$deliveryState,$TimeTaken,$Route ,$vehicleId,
    $orderId);
    /* sends the query to the database server for execution with the 
       provided parameter values, returns true or false */
    $stmt->execute();
      
   //check if the sql query was succesfful by checking if it is equivalent to TRUE
   if($stmt){ 
      echo"delivery marked sucessfully"."<br>";
      echo"mark another delivery : <a href='markDeliveries.html'>markDeliveries</a>.'<br>'";
       echo "or go back to dashBoard : <a href='driversDashboard.php'>Dashboard</a>";
        
   } 
   else {
      //if not inserted redirect to order page to remark the deliver
        echo "delivery marking not sucessful redo the marking:  <a href='markDeliveries.html'>markDeliveries</a>.'<br>'";
   }
  }else{
    echo"the delivery is already marked"."<br>";
    echo"mark another delivery : <a href='markDeliveries.html'>markDeliveries</a>.'<br>'";
    }
   }else{
    echo " WARNING orderCode provided and itemId don't match .'<br>'";
    echo"redo delivery marking: <a href='markDeliveries.html'>markDeliveries</a>.'<br>'";
       echo "or go back to dashBoard : <a href='driversDashboard.php'>Dashboard</a>";
   }
  }else{
    echo " No item with the orderId provided.'<br>'";
     
       echo "go back to dashBoard : <a href='driversDashboard.php'>Dashboard</a>";
   }
}else{
    echo "you are yet to be assigned a vehicle.'<br>'";
    echo"mark another delivery : <a href='markDeliveries.html'>markDeliveries</a>.'<br>'";
       echo "go back to dashBoard : <a href='driversDashboard.php'>Dashboard</a>";
   }
   //close the connection to the database using the $conn variables used to open the connection by invoking the close() function
 $conn->close();

