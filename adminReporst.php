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
                   <section><a href="AdminDashboard.php">Back</a></section>           
        </header>
        <main>
        
              <p style="color: blue; font-size:large; text-align: center;">Buy, we deliver, likewise sell, and we will**</p>
    
                 <div id="home" style="height: 350px; ">
                   
                 <table>
                  <tr>
                        <th colspan="1">Item reports</th>

                        <th colspan="1">Client reports</th>
                        <th colspan="1">Staff report</th>
                        <th colspan="1">Vehicle report</th>
                  </tr>
                  <tr>
                      <th> <ul>
                      <a href="adminReportGeneratin.php?type=listOfItems">list of item's</a>
                        
                        <li><a href="reportTrackitemdetails.html">Track item details</a></li>

                        <a href="adminReportGeneratin.php?type=listOfOrder">list of orders's</a>
                       
                        <li><a href="reportItemBycustomercare.html">Items by customer Care</a></li>
                        <li><a href="reportItembyvehicle.html">Items By vehicle</a></li>
                        <li><a href="repoerItembyroute.html">items By route</a></li>
                        <li><a href="reportItembycategory.html">items By category</a></li>
                        <li><a href="reportItemBydeliverystate.html">Items by delivery state</a></li>
                        <li><a href="reportItembydestination.html">Items by destination </a></li>
                        <li><a href="reportItembysource.html">Items by source</a></li>
                        <li><a href="reportItemInagivendate.html">Items by date</a></li>
                        <li><a href="reportIteminagivenyear.html">Items by year</a></li>
                        <li><a href="reportItemsinagivenmonth.html">Items by month</a></li>
                        <li><a href="reportItemwherechargesaregreaterthan.html">Item where charges range between</a></li>
                        
 
                      </ul> </th>
                      <th> <ul>
                      <a href="adminReportGeneratin.php?type=listOfUsers">list of user's</a>
                        <br></br>

                        <a href="adminReportGeneratin.php?type=listOfSenders">list of sender's</a>
                        <br></br>
                        <a href="adminReportGeneratin.php?type=listOfFeedbacks">list of Feedback's</a>
                         
                        </li>
                        <li><a href="reportItembysender.html">Items by sender</a></li>
                        
                      <li><a href="reportTrackclientActivities.html">Track client Activities</a></li>
                         
                      </ul></th>
                      <th> <ul> 
                      <a href="adminReportGeneratin.php?type=listOfStaff">list of staff's</a>
                      <li><a href="reportTrackcustomerCareActivities.html">Track customer Care Activities</a></li>

                      <li><a href="reportTrackDriverActivities.html">Track Driver Activities</a></li>
                      <li><a href="reportItemBycustomercare.html">Items by customer Care</a></li>
                       
                        <br></br>
                      </ul></th>
                      <th> <ul>                 
                                              
                        <a href="adminReportGeneratin.php?type=listOfVehicles">list of vehicle's</a>
                        <br></br>
                        <li><a href="reportItembyvehicle.html">Items By vehicle</a></li>
                         
                      </ul> </th>                                              
                                           
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