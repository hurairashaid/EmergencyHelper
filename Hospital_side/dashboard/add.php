<!DOCTYPE html>
<html>
<?php
  include_once 'config.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $id = $_SESSION['id'];
$age = $_POST['age'];
$name = $_POST['name'];
$CNIC = $_POST['CNIC'];
$RCNIC = $_POST['RCNIC'];
$contact = $_POST['contact'];
$disease = $_POST['disease'];
date_default_timezone_set('Pakistan/Karachi');
$date = date('Y/m/d');
$sortedDate =  str_replace('/','-',$date);
$sql = "INSERT INTO `Patients` (`id`, `Name`, `CNIC`, `relative_cnic`, `diesease`, `phone_no`, `Date_addmited`, `date_released`, `hospital_id`, `pre` , `post` ) VALUES (NULL, '$name' , '$CNIC', '$RCNIC' , '$disease' , '$contact'
, '$sortedDate' , '0001-01-01', $id , 0 , 1)";
$result = mysqli_query($conn,$sql);
if($result == 1){
    $sql0 = "UPDATE `hospital` SET `space` = `space` - 1 WHERE `id` = $id";
    $result0 = mysqli_query($conn,$sql0);
    header("location: ../dashboard/index.php");
    exit;
  }else{
    $error = "Please fill the form correctly there is some error sorry for inconvince";
    echo $sql;
  }
}

?>



<head>
<title>Title of the document</title>
<link rel="stylesheet" href="add.css" />
</head>

<body>
<div class="container">
    <img
      src="strecher.webp"
      alt="image">
    <div class="container-text">
      <h2>Add Patients</h2> 
      <p>Add patient to the Emergency Room</p>
      <p><?php echo $error ?></p>
      <form class="container-button" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <input type="text"   name="name" placeholder="patient full name">
      <input type="number" name="age" placeholder="patient age">
      <input type="number" name="CNIC" placeholder="Patient CNIC without hyphens">
      <input type="number" name="RCNIC" placeholder="Patient relative CNIC">
      <input type="number" name="contact" placeholder="Gurdian Contact no">
      <input type="text"   name="disease" placeholder="diasese">
      <input type="submit" value="Add Records">
      </form>
    </div>
</div>
</body>

</html>