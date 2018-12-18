<!DOCTYPE html>
<html>
<title>DACC-Homepage</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: sans-serif}
body{
  background-image: url("https://www.avantida.com/wp-content/uploads/2016/05/Unknown.png");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-position: center center;
  background-size:cover;
}
.Title-bar{
  position: absolute;
  background-color: #616161;
  width: 100%;
  height: 50px;
  top: 0px;
  left: 0px;
}
.User-info{
  background-color: white;
  position: absolute;
  left: 0px;
  background: white;
  width: 350px;
}

.Order-op{
  height: 100%;
  position: fixed;
  margin-left: 300px;
  top:50px;
  background: white;
  width: 350px;
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

      <div class="w3-collapse w3-white w3-animate-left" style=" height: 100%; position: fixed;margin-left: 300px;top:50px;width: 350px; ">
      <div class="w3-bar-block" style="padding-top:47px;">
      <form  method="post">
      <ul style="list-style-type: none;">
        <li><p>Model Number : &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;<input type="text" name="Model"> </p></li>
        <li style="padding-top:20px;"><input class="w3-button w3-blue" type="submit"  name="submit"> </p></li>

      </ul>
    </form>
  </div>

    </div>
<?php

  require_once('DB_connection.php');

  //(https://docs.microsoft.com/en-us/azure/mysql/connect-php)
  //$coon mean database connection just incase u dunno
  if(mysqli_connect_errno($conn)){
    die('Failed to connect to MySQL: '.mysqli_connect_error());
  }

  if(isset($_POST['submit'])){

    $data_missing = array();
    if(empty($_POST ['Model'])){
      $data_missing[]="Model";

    }else {

    	$model=trim($_POST ['Model']);
    }
    	$container_id='';
    	$status='Delivered';

   /* if(empty($data_missing)){
      echo "Success4";
    }else{
      foreach($data_missing as $missing){
            echo "$missing<br/>";
    }

  }*/
  

  if(empty($data_missing)){
    if($stmt = mysqli_prepare($conn,"INSERT INTO container(container_id,Model,status)VALUES(?,?,?)")){
      mysqli_stmt_bind_param($stmt,'iss',$container_id,$model,$status);
      mysqli_stmt_execute($stmt);
      printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
      mysqli_stmt_close($stmt);
     

    }

    // Close the connection
//mysqli_close($dbc);
  }

  }
?>

</body>
</html>
