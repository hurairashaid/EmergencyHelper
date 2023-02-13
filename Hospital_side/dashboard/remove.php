<!DOCTYPE html>
<html>
<?php
include_once 'config.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM Patients WHERE hospital_id = $id and date_released = '0001-01-01' and post = '1'";
$result = mysqli_query($conn , $sql);
$deleteid = $_GET['id'];
if (is_null($deleteid) == 0) {
date_default_timezone_set('Pakistan/Karachi');
$date = date('Y/m/d');
$sql1 = "UPDATE `Patients` SET `date_released` = '$date' WHERE `Patients`.`id` = $deleteid;";
$result1 = mysqli_query($conn , $sql1);
$sql0 = "UPDATE `hospital` SET `space` = `space` + 1 WHERE `id` = $id";
$result0 = mysqli_query($conn,$sql0);
header("location: ./remove.php");
    exit;
}
?>
<head>
<title>Title of the document</title>
<link rel="stylesheet" href="remove.css"/>

</head>
<body>
<table>
  <thead>
    <tr>
      <th>Patient Name</th>
      <th>Patient CNIC</th>
      <th>Relative CNIC</th>
      <th>Disease</th>
      <th>Contact</th>
      <th>Addmited date</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = mysqli_fetch_array($result)):;?>
    <tr>
      <td data-column="Name"><?php echo $row['Name'] ?></td>
      <td data-column="CNIC"><?php echo $row['CNIC'] ?></td>
      <td data-column="RCNIC"><?php echo $row['relative_cnic'] ?></td>
      <td data-column="disease"><?php echo $row['diesease'] ?></td>
      <td data-column="contact"><?php echo $row['phone_no'] ?></td>
      <td data-column="date"><?php echo $row['Date_addmited'] ?></td>
      <td data-column="date"><a href="http://localhost/Hospital_side/dashboard/remove.php?id=<?php echo $row['id'] ?>">delete</a></td>
    </tr>
  <?php endwhile;?>
  
  </tbody>
</table>
</body>

</html>