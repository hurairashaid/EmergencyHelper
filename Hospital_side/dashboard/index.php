<?php
  include_once 'config.php';
  ini_set('display_errors', 1); 
 ini_set('display_startup_errors', 1); 
 error_reporting(E_ALL);
?>
<html>
  <head>
  
    <title>Title of the document</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/7f17c4d5f0.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
  <?php
   $id = $_SESSION['id'];
   if(is_null($id)){
    header("location: ../Hospital_Login/index.php");

   }
   $sql = "SELECT * FROM hospital WHERE id = $id";
   $result = mysqli_query($conn, $sql);
   $data = mysqli_fetch_array($result);
   $sql2 = "SELECT * FROM Patients where hospital_id = $id and date_released = '0001-01-01' and post = '1'";
   $result2 = mysqli_query($conn,$sql2);
   $number = mysqli_num_rows($result2);  
   $sql3 = "SELECT * FROM Patients where hospital_id = $id and date_released = '0001-01-01' and post = '0'";
   $result3 = mysqli_query($conn,$sql3);
   $number2 = mysqli_num_rows($result3);  
  ?>
    <div class="dashboard">
      <div class="sidebar">
        <div>
          <img src="ambulance.png" />
          <h2><?php  echo $data["Name"]; ?></h2>
        </div>
        <div onclick="location.href='./admittedpatient.php';">
          <h3>Admitted Patients</h3>
        </div>
        <div onclick="location.href='./patienthistory.php';">
          <h3>Patients History</h3>
        </div>
        <div>
          <h3>Request an API</h3>
        </div>           
      </div>
      <div class="main">
        <h2>Welcome Back Mangement of <?php echo $data["Name"] ?></h2>
        <div>
          <div 
          
          
          
          onclick="location.href='./add.php';">
              <i class="fa-solid fa-person-circle-plus"></i>
              <h3>Add paitent</h3>
              <p>remaining bed : <?php echo ($data['Emergency_bed'] - ($number + $number2)) ?></p>            
          </div>
          <div onclick="location.href='./remove.php';">
              <i class="fa-solid fa-user-minus"></i>
              <h3>Remove patients</h3>
              <p>remaining patient : <?php echo $number ?></p> 
          </div>
          <div onclick="location.href='./pre.php';">
              <i class="fa-solid fa-cookie"></i>
              <h3>Prebooked patients</h3>
              <p>prebook :  <?php echo $number2 ?></p> 
          </div>
        </div>
        <div>
          <a href="./logout.php">Log out</a>
        </div>
      </div>
    </div>
    
  </body>
</html>
