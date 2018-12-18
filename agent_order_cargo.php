<!DOCTYPE html>
<html>
<title>DACC-Orders</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
  background-color:#F5F5F5;;
  width: 350px;
}

ul li {
  padding-top: 5px;
}

</style>
<body>
  <!-- Top container -->
  <div class="Title-bar" >
    <button  class="w3-dark-grey" style=" border:none; margin-top:10px;"><a href="index.php"style="text-decoration:none; ">&nbsp;	&nbsp;Log out</a></button>
    <span class="w3-bar-item w3-right" style="padding-top: 5px;margin-top:10px;color:white;" >DACC-Assignment</span>
  </div>
    <hr>

    <nav class="w3-sidebar " style="background-color:#F5F5F5;z-index:3;width:300px;margin-top:50px;" id="mySidebar"><br>
    <div class="w3-container w3-row" >
      <div class="w3-col s4">
        <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
      </div>
      <div class="User-info" style="padding-left:10px;">
        <span>Welcome, <strong>Agent</strong></span><br>

      </div>
    </div>
   

    <div class="w3-bar-block">

        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a href="agent_order_cargo.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Orders</a>
        <a href="schedule_view.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Schedule</a>
        <a href="View_container.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-truck fa-fw"></i>  View orders</a><br><br>

    </div>
  </nav>
    <div class="w3-collapse w3-white w3-animate-left" style=" height: auto; position: auto; margin-left: 300px; top:50px;width: 350px; ">
      <form  method="post">
      <ul style="list-style-type: none;">
        <li><p>Depature : <input class="w3-input w3-animate-input" type="text" name="Depature"> </p></li>
        <li><p>Destination : &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;<input class="w3-input w3-animate-input" type="text" name="Destination"> </p></li>
        <li><p>Sender Name : <input class="w3-input w3-animate-input" type="text" name="Sender_name"> </p></li>
        <li><p>Sender Phone : <input class="w3-input w3-animate-input" type="text" name="Sender_Phone"> </p></li>

        <li><p>Receiver Name:   &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;<input  class="w3-input w3-animate-input" type="text" name="Receiver_name"> </p></li>
        <li><p>Receiver Phone : <input class="w3-input w3-animate-input" type="text" name="Receiver_Phone"> </p></li>
        <li><p>Model : &nbsp; &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;<select name='model' class='w3-select'>
          <?php require_once('DB_connection.php');

              $sql = mysqli_query($conn,"SELECT Model from container where status='Delivered'");
              while ($row = $sql->fetch_assoc()){
                unset($model);
                $model = $row['Model'];
                echo '<option value="'.$model.'">'.$model.'</option>';


              }

          ?>
        </select></p></li>
        
        <li style="padding-top:20px;"><input class="w3-button w3-blue"type="submit"  name="submit"> </p></li>

      </ul>
    </form>
  </div>

    </div>

</body>
<?php

  require_once('DB_connection.php');

  //(https://docs.microsoft.com/en-us/azure/mysql/connect-php)
  //$coon mean database connection just incase u dunno
  if(mysqli_connect_errno($conn)){
    die('Failed to connect to MySQL: '.mysqli_connect_error());
  }

  if(isset($_POST['submit'])){
    $data_missing = array();
    if(empty($_POST ['Depature'])){
      $data_missing[]="Depature";

    }else{
      $Depature = trim($_POST ['Depature']);

    }

    if(empty($_POST ['Destination'])){
      $data_missing[]="Destination";
    }else{
      $destination = trim($_POST ['Destination']);

    }

    if(empty($_POST ['Sender_name'])){
      $data_missing[] = "Sender_name";
    }else{
      $sender_name = trim($_POST ['Sender_name']);

    }

    if(empty($_POST ['Sender_Phone'])){
      $data_missing[]="Sender_Phone";
    }else{
      $sender_phone = trim($_POST ['Sender_Phone']);

    }

    if(empty($_POST ['Receiver_name'])){
      $data_missing[] = "Receiver_name";
    }else{
      $receiver_name = trim($_POST ['Receiver_name']);

    }

    if(empty($_POST ['Receiver_Phone'])){
      $data_missing[]="Receiver_Phone";
    }else{
      $receiver_phone = trim($_POST ['Receiver_Phone']);

    }

    if(empty($_POST ['model'])){
      $data_missing[]="model";
    }else{
      $model = trim($_POST ['model']);

    }


    

    if(empty($data_missing)){
      echo "Success4";
    }else{
      foreach($data_missing as $missing){
            echo "$missing<br/>";
    }

  }
  

  if(empty($data_missing)){
    if($stmt = mysqli_prepare($conn,"INSERT INTO orders(Depature,Destination,Sender_name,Sender_Phone,Receiver_name,Receiver_Phone,container_model)VALUES(?,?,?,?,?,?,?)")){
      mysqli_stmt_bind_param($stmt,'sssssss',$Depature,$destination,$sender_name,$sender_phone,$receiver_name,$receiver_phone,$model);
      mysqli_stmt_execute($stmt);
      printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
      mysqli_stmt_close($stmt);

    }

    

    $query=" UPDATE container set status='Loaded' where Model='$model'";

    if(mysqli_query($conn,$query)) {
    echo "Order Made successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

    // Close the connection
//mysqli_close($dbc);
  }

  }
?>
</html>
