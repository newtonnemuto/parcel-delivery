<?php
// Start a session to manage user
session_start(); 
//estalish connnection 
$servername="localhost";
$username="Newton";
$password="database@123";
$dbname="parceldelivery";
$conn=new mysqli($servername,$username,$password,$dbname); // using the php new mysqli function to establish a connection.

/* Check if the connection to the database was successful usinh connect_error if there is an connect_error the error will be 
displayed and execution will be terminited by the die function. */
 if ($conn->connect_error)  {
       die ("connection failled:". $conn->connect_error); // Terminate script execution if the connection fails
        
}  

$userId=$_SESSION['userId'];

//get user details
$user="select  name,mobileNumber,email,address,userName,IDNO,DtOfBth,gender
from user  where  userId=$userId";
/*executes the SQL query using the query() method of the database connection 
       object $conn. it sends the SQL query to the database server for execution.*/
$result=$conn->query($user);
 //the fetch_assoc() method retrieves a single row as an associative array
      $row=$result->fetch_assoc ();
    
      $name=$row['name'];
      $mobileNumber=$row['mobileNumber'];
      $email=$row['email'];
      $address=$row['address'];
      $userName=$row['userName'];
      $IDNO=$row['IDNO'];
      $DtOfBth=$row['DtOfBth'];
      $gender=$row['gender'];
       
 
 $conn->close(); //close database connection
 ?>
 <!DOCTYPE html>
 <html>
     <head>
         <title>user account </title>
         <link rel="stylesheet" href="formms.css">
     </head>
     <body>
      <div id="frm" style="background-color: azure; width: 1000px; height:auto;"> 
      <h5>profile</h5>
           <p>Name : <?php echo $name; ?><br> </p>
            
        <p>MobileNumber: <?php echo $mobileNumber; ?><br> </p>
            
        <p>Email :<?php echo  $email ; ?> <br></p> 
         
        <p>Address :<?php echo $address; ?><br></p>
            
       <p>UserName :<?php echo $userName; ?><br></p>    
       
       <p>IDNO :<?php echo $IDNO; ?><br></p> 
       
       <p>Date of Birth :<?php echo $DtOfBth; ?><br></p> 

       <p>Gender :<?php echo $gender; ?><br></p> 

       <h5><a href="editProfile.php">Edit profile</a></h5> 
       <br>
       <h5><a href="profileBack.php">Back</a></h5><br>
            
 
        </div>
     </body>
 </html>