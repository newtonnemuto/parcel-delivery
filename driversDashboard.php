<?php
session_start();
$userId=$_SESSION['userId'];
$userName=$_SESSION['userName']
?>
<html>
    <head>
         
     <title>Admin</title>
        <link rel="stylesheet" href="home.css">
    </head>
    <body  >
        <header>                       
                   <section><img src="logo.png" alt="" style="width: 80px; height: 30px;"></section> 
                   <section style=" background-color: transparent;"></section>         
                   <section> UserName:<?php echo $userName; ?>
                    IdNO:<?php echo $userId; ?>                             
                    </section>  
                   <section><a href="logout.php">logout</a></section>
           
        </header>
        <main>
                <p style="color: blue; font-size:large; text-align: center;">Buy, 
                we deliver, likewise sell, and we will deliver too</p>
    
                  <div id="home" style="height: 350px;">
                   <table> 
                    <tr>
                        <th colspan="2">DriverManage orders</th>
                        <th colspan="3">self details</th>
                    </tr>
                    
                    <tr>
                        <th><a href="driverViewOrderProcesing.php">view orders</a></th>
                        <th><a href="markDeliveries.html">mark deliveries</a></th>
                        <th><a href="history.php">history</a></th>
                        <th><a href="Profile.php">Profile</a></th>
                        <th><a href="feedback.html">Feedback</a></th>
                    </tr>
                   </table>
                                                 
                   </div>     
                             
        </main>
         
         <footer>
            <h2>Contact Us</h2>
            <p>Have questions? Contact our support team.</p>
            <address>
                Email: support@parceldelivery.com<br>
                Phone: 0794455836
            </address>

            <div id="copy">
                &copy; 2024 Parcel Delivery. All rights reserved.
            </div>
        </footer>         
    
    </body>
</html>