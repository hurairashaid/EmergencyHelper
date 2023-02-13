<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>My Website</title>
    <link rel="stylesheet" href="./client.css" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>
  <body>
 <?php
require_once "config.php";
if (is_null($_GET['id'])) {
$sql = "SELECT * FROM hospital";
$result = mysqli_query($conn, $sql);  
}else{
$id = $_GET['id'];
$sql = "SELECT * FROM hospital WHERE Area_id = $id";
$result = mysqli_query($conn, $sql);  
}

$sql1 = "SELECT * FROM area";
$result1 = mysqli_query($conn, $sql1);
?> 
    <navbar class="navigation">
      <div class="dropdown">
       <button class="dropbtn">Filter By Area</button>
       <div class="dropdown-content">
        <?php while($row1 = mysqli_fetch_array($result1)):;?>
         <a href="./client.php?id=<?php echo $row1['id'] ?>"><?php echo $row1['area'] ?></a>
        <?php endwhile;?>
       </div>
      </div>
      <div>Search Bar</div>
    </navbar>
    <div class="main">
      <?php while($row = mysqli_fetch_array($result)):;?>
      <div class="card">
        <img src="./shoukat_khanam.jpg" class="card-img-top" alt="..." />
        <div class="card-body">
          <h5 class="card-title"><?php echo $row["Name"] ?></h5>
          <p class="card-text">
            <?php echo $row["address"] ?>
          </p>
          <div>
            <a href="./preadmit.php?id=<?php echo $row['id'] ?>" class="btn btn-primary card-button" style='pointer-events: <?php echo ($row['space'] == 0) ? "none" : "auto" ?>'>Pre Booking</a>
            <div style='color: <?php echo ($row['space'] == 0) ? "red" : "green" ?>'><?php echo $row['space'] ?></div>
          </div>
        </div>
      </div>
      <?php endwhile;?>
    </div>

    <script src="index.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
