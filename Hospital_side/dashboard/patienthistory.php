<!DOCTYPE html>
<html>
<?php
include_once 'config.php';
$id = $_SESSION['id'];
$sql = "SELECT * FROM Patients WHERE hospital_id = $id and date_released != '0001-01-01'";
$result = mysqli_query($conn , $sql);

?>
<head>
<title>Title of the document</title>
<link rel="stylesheet" href="patienthistory.css"/>

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
      <th>Discharge date</th>
      <th>Pre Rejistrated</th>

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
      <td data-column="date"><?php echo $row['date_released'] ?></td>

      <td data-column="pre"><?php  echo ($row['pre'] == 0) ? 'No' : 'Yes'  ?></td>
    </tr>
  <?php endwhile;?>
  
  </tbody>
</table>
</body>

</html>