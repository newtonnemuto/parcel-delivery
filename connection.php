<?php 
//estalish connnection to the database
$servername="localhost";
$username="Newton";
$password="database@123";
$dbname="parceldelivery";
$conn=new mysqli($servername,$username,$password,$dbname); // using the php new mysqli function to establish a connection.

/* Check if the connection to the database was successful usinh connect_error if there is an connect_error the error will be 
displayed and execution will be terminited by the die function. */
 if ($conn->connect_error)  {
   echo"coection error". $conn->connect_error; //display the connection error if it exists
    die ("connection failled:". $conn->connect_error); // Terminate script execution if the connection fails
}
   // process  form data from the post request and set the collected data to php variable for use in the php script
      $name=$_POST['name']." ". $_POST['lname'];
      $mobileNumber=$_POST['mobileNumber'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      $username=$_POST['userName'];
      $pass=$_POST['password'];
      $role=$_POST['role'];
      $password= password_hash($pass,PASSWORD_BCRYPT); /* Hash the password for using the password_hass 
      function by passing the password variable and  PASSWORD_BCRYPT as arguments */
      $IDNo = $_POST['IDNo'];
      $IDNo=$_POST['IDNo'];
      $DtOfBth=$_POST['DtOfBth'];
      $gender=$_POST['gender'];
       
       
      //chek if the username is aready used in the database
      $sql_chekUserName="select * from user where userName='$username'"; /*sql query to select from user where the  
      user name is the username used for registartion */ 
      $result_userName=$conn->query($sql_chekUserName); // set the result of the query to $result_userName variable
      $count=mysqli_num_rows($result_userName); // use mysqli_num_rows function to check the number of rows picked

      /* if the number of rows exeed 0 the user name is  used thus request the client to use another userName to create an account 
      else if there is no row picked the user name is not used thus create the accout in the database*/
      if($count> 0){
         echo "user name already used set another userName";
         echo "<p><a href='userRegistrationform.html'> use another userName to register</a></P>"; /* dislay alink to direct the
          user to create an accoutnt with different userName */
         }else{
         // ensure users registering as staff are offical staffs
         if ($role !='client'){
            $sql="select * from staff where userName='$username' and position='$role' ";
           $user=$conn->query($sql);

            $cout=mysqli_num_rows($user);

            if($cout>0 || $role ==='client'){
               addUser($conn);
 
   }else{
      echo"for one to register as staff they have to be registered withUs 
      and assigned offical userNames.";
      echo"<br>";
      echo"register as a client <a href='userRegistrationForm.html'>register</a>";
   }
   
}else{
    if($role==='client'){
      addUser($conn);
    }
}
  }

  function addUser($conn){
     // process  form data from the post request and set the collected data to php variable for use in the php script
     $name=$_POST['name']." ". $_POST['lname'];
     $mobileNumber=$_POST['mobileNumber'];
     $email=$_POST['email'];
     $address=$_POST['address'];
     $username=$_POST['userName'];
     $pass=$_POST['password'];
     $role=$_POST['role'];
     $password= password_hash($pass,PASSWORD_BCRYPT); /* Hash the password for using the password_hass function by passing the password variable
     and  PASSWORD_BCRYPT as arguments */
     $IDNo = $_POST['IDNo'];
     $IDNo=$_POST['IDNo'];
     $DtOfBth=$_POST['DtOfBth'];
     $gender=$_POST['gender'];
             
   //insert data into database  since the user name is not used, thus creating an account for the new client , 
      // a query that inserts values using placholders in prepare function using conn object ?
      $sql="INSERT INTO user (name,mobilenumber,email,address,role,userName,
      password,IDNo,DtOfBth,gender)
      VALUES (?,?,?,?,?,?,?,?,?,?)"; 
      $insertuserdetails=$conn->prepare($sql);
      //The bind_param() method binds variables to the placeholders in the SQL query.
      $insertuserdetails->bind_param("sisssssiss",$name,$mobileNumber,$email,$address,
      $role,$username,$password,$IDNo,$DtOfBth,$gender);
      /* sends the query to the database server for execution with the 
       provided parameter values, returns true or false */
      $insertuserdetails->execute();
   //check if the sql query was succesfful by checking if it is equivalent to TRUE
      if($insertuserdetails){ 
       // If the insertion is successful, redirect the user to the login page using php header function   
      
      header("location:login.html");

      } 
      else {
   // If there's an error during insertion, display the error message by concantinating $sql variable that is the query and the error message
      echo"error:". $sql ."<br>".$conn->error;
      }

  }
    //close the connection to the database using the $conn variables used to open the connection by invoking the close() function
 $conn->close();

