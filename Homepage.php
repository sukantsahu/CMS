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

<!--   
    <div class="w3-bar-block " >

        <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
        <a href="Homepage.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Homepage</a>

        <a href="Orders.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Orders</a>
        <a href="Schedule.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>  Schedule</a>
        <a href="container.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-truck fa-fw"></i>  Container</a><br><br>

    </div>
  </nav> -->

  <div class="w3-collapse w3-white w3-animate-left" style=" height: 100%; position: fixed;margin-left: 300px;top:50px;width: auto; ">
      <div class="w3-bar-block" style="padding-top:47px;">
      <p style=" text-align: justify; ">
        Maersk Line is the global container division and the largest operating unit of the A.P. Moller – Maersk Group, a Danish business conglomerate. It is the world's largest container shipping company having customers through 374 offices in 116 countries. It employs approximately 7,000 sea farers and approximately 25,000 land-based people. Maersk Line operates over 600 vessels and has a capacity of 2.6 million TEU. The company was founded in 1928.
      </p>
      <p style=" text-align: justify; ">
        Operating in 100 countries and transporting goods around the globe, at first glance it would appear Danish shipping company Maersk Line is already handling all the cargo it can manage. But when Maersk determined that the volume of most of the goods it was shipping had grown to full capacity, the company decided that cloud powered solutions would be a crucial part of rectifying the situation.
      </p>
  </div>

    </div>

</body>
</html>
