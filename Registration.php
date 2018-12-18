<!DOCTYPE html>
<html>
<head><title>DACC Registration</title></head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.register-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background:#e0e0e0;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;

}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: white;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: all;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: white; /* fallback for old browsers */

  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.Title-bar{
  position: absolute;
  background-color: #616161;
  width: 100%;
  height: 50px;
  top: 0px;
  left: 0px;

}
</style>
<body>
  <div class="Title-bar" >
    <button  class="w3-dark-grey" style=" border:none; margin-top:10px;"><a href="login.php"style="text-decoration:none; " >Already have Account</a></button>
    <span class="w3-bar-item w3-right" style="padding-top: 5px;margin-top:10px;color:white;" >DACC-Assignment</span>
  </div>
  <div class="register-page">

    <div class="form">
      <form class="register-form"  method="post">
        <input type="text" name="username" placeholder="name">
        <input type="password" name="password" placeholder="password">
        <input type="text" name="email" placeholder="email address">
        <select name="role">
          <!-- <option value="1">Admin</option> -->
          <option value="2">Agent</option>

        </select>
        <Button class="w3-blue"type="submit" name="submit">Create</button>
        <p class="message">By register the account you have agree the Term & Condition</p>
      </form>

<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'dacc';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}


  if(isset($_POST['submit'])){

        $data_missing = array();

        if(empty($_POST ['username'])){
          $data_missing[]="Username is missing";

        }else{
          $Username = trim($_POST ['username']);

        }

        if(empty($_POST ['password'])){
          $data_missing[] = "Password is missing";
        }else{
          $Password = trim($_POST ['password']);

        }

        if(empty($_POST ['email'])){
          $data_missing[]="Email is missing";
        }else{
          $Email = trim($_POST ['email']);

        }
        if(empty($_POST ['role'])){

        }else{
          $Status = trim($_POST ['role']);

        }
      
        if(empty($data_missing)){

        }else{
          foreach($data_missing as $missing){
                echo '<p style="color:red;">'.$missing.'</p>';

        }

      }


      if(empty($data_missing)){
        if($stmt = mysqli_prepare($conn,"INSERT INTO user(username,password,email,role)VALUES(?,?,?,?)")){
          mysqli_stmt_bind_param($stmt,'sssi',$Username,$Password,$Email,$Status);
          mysqli_stmt_execute($stmt);
          printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
          mysqli_stmt_close($stmt);
          header("Location:https://localhost/index.php");
        }

        // Close the connection
   // mysqli_close($dbc);
      }
    }



         ?>
    </div>
  </div>

</body>

</html>
