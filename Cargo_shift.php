<!DOCTYPE html>
<html>
<title>DACC-Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body{
  background-color: : white;

}
.Title-bar{
  position: absolute;
  background-color:#616161;
  width: 100%;
  height: 50px;
  top: 0px;
  left: 0px;
}

.Order-info{
  background-color: Grey;
  width: 450px;
}
ul li{
  float: left;
  padding-left: 10px;
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

    <div class="w3-white w3-margin-left w3-border w3-round w3-card" style="left:30px;position:fixed;top:90px;height:100px;width:90%;">
      <form method="post">
      <ul style="list-style-type: none; ">
        <li><p>Order ID : <input type="text" name="Order_ID"> </p></li>
         <li><input type="submit" name="search" value="Select" style="margin-top:15px;"></li>



      </ul>
      <form>
    </div>
    <?php
        session_start();
        require_once('DB_connection.php');

             if(isset($_POST['search'])){
                 if(empty($_POST['Order_ID'])){
                  echo'Please insert the order ID';
            }else{
             $search_value=$_POST["Order_ID"];
             require_once('DB_connection.php');
             if(mysqli_connect_errno($conn)){
               die('Failed to connect to MySQL: '.mysqli_connect_error());
             }

             $query = "SELECT *FROM orders WHERE Order_ID like '%$search_value%'";
             $result = mysqli_query($conn,$query);
             if(mysqli_num_rows($result)>0){
              $_SESSION['store_id'] = $search_value;
               echo'<table class="w3-table w3-margin-left" style="position:relative;left:30px; height:50px;width:90%;top:250px;">';
               echo'<tr class="w3-sand"><th>Order ID</th><th>Quantity</th><th>Warehouse Location</th><th>Destination</th></tr>';
                 // output data of each row
                 while($row = mysqli_fetch_assoc($result)){
                   echo'<tr class=" w3-pink"><td>'.$row["Order_ID"].'</td><td>'.$row["Quantity"].'</td><td>'.$row["Depature"].'</td><td>'.$row["Destination"].'</td></tr>';}
                 echo'</table>';
             }else{
               echo "0 results";
             }
           }
           }else{
             $_SESSION['store_id'] = 'No set yet ';
           }
    ?>

    <div class="w3-white w3-margin-left w3-border w3-round w3-card" style="position:fixed;left:30px;top:350px;height:120px;width:90%;">
    <form method="post">

    <ul style="list-style-type: none;">
      <p style="padding-left:10px;">Shift To :</p>
      <li><p>Order ID: <input type="text" name="store_id" value="<?php echo $_SESSION['store_id'];?>"> </p></li>
      <li><p>Warehouse Location : <input type="text" name="Warehouse_ID_chg"> </p></li>
      <li><p>Destination : <input type="text" name="Destination_chg"> </p></li>
      <li><p><input type="submit" name="submit"> </p></li>
      <form>
    </ul>
    </div>


</body>
<?php
if(isset($_POST['submit'])){

  $warehouse_ID_chg = trim($_POST['Warehouse_ID_chg']);
  $destination_chg = trim($_POST['Destination_chg']);
  $store_id = trim($_POST['store_id']);
require_once('DB_connection.php');
if(mysqli_connect_errno($conn)){
  die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$query = "UPDATE orders SET Depature = '$warehouse_ID_chg' ,Destination = '$destination_chg' WHERE Order_ID='$store_id'";

if(mysqli_query($conn,$query)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
}
?>
</html>
