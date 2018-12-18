<!DOCTYPE html>
<html>
<title>DACC-Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body{
  background-color: : white;

}
.Title-bar{
  position: absolute;
  background-color: #616161;
  width: 100%;
  height: 50px;
  top: 0px;
  left: 0px;
}
.Order-info{
  background-color: Grey;
  width: 450px;
}
ul{
  float: left;
}
ul li {
  padding-top: 5px;
}
</style>
<body>
  <!-- Top container -->
  <div class="Title-bar" >
    <button  class="w3-dark-grey" style=" border:none; margin-top:10px;"><a href="index.php"style="text-decoration:none; " >Log-out</a></button>
    <a href="Homepage.php" class="w3-bar-item w3-button">Homepage</a>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Orders</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="Cargo_order.php" class="w3-bar-item w3-button">Order cargo</a>
      <a href="Cargo_shift.php" class="w3-bar-item w3-button">Shift Cargo</a>
      <a href="Cargo_view.php" class="w3-bar-item w3-button">View Cargo</a>
    </div>
  </div>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Schedule</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="set_schedule.php" class="w3-bar-item w3-button">Set Schedule</a>
      <a href="view_schedule.php" class="w3-bar-item w3-button">View Schedule</a>
    </div>
  </div>
  <div class="w3-dropdown-hover">
    <button class="w3-button">Container</button>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="Add_container.php" class="w3-bar-item w3-button">Add Container</a>
      <a href="container_view.php" class="w3-bar-item w3-button">View Container</a>
    </div>
  </div>
    <span class="w3-bar-item w3-right" style="padding-top: 5px;margin-top:10px;color:white;">DACC-Assignment</span>
  </div>
    <hr>

</body>
<?php
  require_once('DB_connection.php');
  if(mysqli_connect_errno($conn)){
    die('Failed to connect to MySQL: '.mysqli_connect_error());
  }

  $query = "SELECT *FROM orders where status='Loaded'";
  $result = mysqli_query($conn,$query);
  static $row_num = 0;

  if(mysqli_num_rows($result)>0){

    echo'<table class="w3-table w3-striped w3-border" style="width:100%"><tr><th>No.</th><th>Order ID</th><th>Depature</th><th>Destination</th><th>Sender Name</th><th>Sender Phone</th><th>Receiver Name</th><th>Receiver Phone</th><th>Container</th><th>Received</th></tr>';
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){
          $row_num++;
          echo'<tr><td>'.$row_num.'</td><td>'.$row["Order_ID"].'</td><td>'.$row["Depature"].'</td><td>'.$row["Destination"].'</td><td>'.$row["Sender_name"].'</td><td>'.$row["Sender_Phone"].'</td><td>'.$row["Receiver_name"].'</td><td>'.$row["Receiver_Phone"].'</td><td>'.$row["container_model"].'</td><td><a href="receive.php?id='.$row["container_model"].'">Received</a></td></tr>';}
      echo'</table>';

  }else{
    echo "0 results";
  }


?>
</html>
