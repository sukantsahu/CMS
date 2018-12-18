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
    <button  class="w3-dark-grey" style=" border:none; margin-top:10px;"><a href="agent_order_cargo.php"style="text-decoration:none; ">&nbsp;	&nbsp;Back</a></button>
    <span class="w3-bar-item w3-right" style="padding-top: 5px;margin-top:10px;color:white;" >DACC-Assignment</span>
  </div>
    <hr>

</body>
<?php
  require_once('DB_connection.php');
  if(mysqli_connect_errno($conn)){
    die('Failed to connect to MySQL: '.mysqli_connect_error());
  }

  $query = "SELECT *FROM schedule";
  $result = mysqli_query($conn,$query);
  static $row_num = 0;

  if(mysqli_num_rows($result)>0){

    echo'<table class="w3-table w3-striped w3-border" style="width:100%"><tr><th>Depart</th><th>Warehouse</th><th>Destination</th><th>Arrival</th></tr>';
      // output data of each row
      while($row = mysqli_fetch_assoc($result)){

          echo'<tr><td>'.$row["Depart"].'</td><td>'.$row["Warehouse_Location"].'</td><td>'.$row["Destination"].'</td><td>'.$row["Arrival"].'</td></tr>';}
      echo'</table>';

  }else{
    echo "0 results";
  }


?>
</html>
