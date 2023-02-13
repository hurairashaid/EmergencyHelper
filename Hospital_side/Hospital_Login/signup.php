<!doctype html>
<html lang="en">
<?php
 include_once 'config.php';
 $sql = "SELECT * FROM area";
 $result = mysqli_query($conn, $sql);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body style="background-color: aquamarine;">
<?php
 if($_SERVER["REQUEST_METHOD"] == "POST"){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $contact = $_POST['contact'];
     $bed = $_POST['bed'];
     $address = $_POST['address'];
     $password = $_POST['password'];
     $newarea = $_POST['newarea'];
     if (empty($newarea)) {
         $area = $_POST['area'];
     }else{
        $newarea = $_POST['newarea'];
        $sql3 = "INSERT INTO `area` (`id`,`area`) VALUES (NULL , '$newarea')";
        $result3 = mysqli_query($conn,$sql3);
        $last_id = mysqli_insert_id($conn);
        $area = $last_id;
     }
     if($_POST['password'] == $_POST['confirmPassword']){
       $sql1 = "INSERT INTO `hospital` (`id`, `Name`, `Emergency_bed`, `address`, `Area_id`, `contact`, `email`, `passwords`,`space`) VALUES (NULL, '$name', '$bed', '$address', '$area', '$contact' ,'$email', '$password' , '$bed')";
       $result1 = mysqli_query($conn,$sql1);
       if(!$result1){
         $error = "Email already exist please recheck your Email";
         echo $sql1;
       }else{
           $_SESSION['loggedin'] === true;
           $last_id = mysqli_insert_id($conn);
           $_SESSION['id'] = $last_id;
           header("location: ../dashboard/index.php");
           exit;
       }
     }else{
         $error = "Please re-enter password. password confirmation not matched";
     }  
 }  
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-1 text-center forPosition fw-bold ">Sign in</h1>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="container custom">
            <div class="row">
                <div class="bg-white custom rounded shadow">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
                            <h1 class="text-info">Create Account</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <p class="text-secondary text-center">Hello Hospital!</p>
                        </div>
                    </div>
                    <?php if($error !== ""){ ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <p class="text-secondary text-center"><?php echo $error;?></p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
                            <p class="text-secondary">Please fill out the form below to get started</p>
                        </div>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                            <div class="row">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i> <input
                                        type="text" class="form-control ms-3" placeholder="Hospital Name"
                                        aria-label="First name" name="name"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                            <div class="row">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i> <input
                                        type="email" class="form-control ms-3" placeholder="Email"
                                        aria-label="Hospital" name="email"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                            <div class="row">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i> <input
                                        type="number" class="form-control ms-3" placeholder="Contact Number"
                                        aria-label="Hospital" name="contact"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                            <div class="row">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i> <input
                                        type="number" class="form-control ms-3" placeholder="Number of bed in Emergency"
                                        aria-label="Hospital" name='bed'></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                            <div class="row">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i> <input
                                        type="text" class="form-control ms-3" placeholder="Address"
                                        aria-label="First name" name="address"></span>
                            </div>
                        </div>
                    </div>
                     
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                           <select name="area">
                                    <option selected disabled>Select your area</option>
                                    <?php 
                                    $sql = "SELECT * FROM area";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['area'] ?></option>
                                    <?php } ?>
                            </select>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                            <div class="row">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i> <input
                                        type="text" class="form-control ms-3" placeholder="fill if area is not in above list"
                                        aria-label="First name" name='newarea'></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                            <div class="row">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i> <input
                                        type="password" class="form-control ms-3" placeholder="password"
                                        aria-label="First name" name='password'></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                            <div class="row">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i> <input
                                        type="password" class="form-control ms-3" placeholder="confirm password"
                                        aria-label="First name" name='confirmPassword'></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                         <input style="background-image: linear-gradient( to right bottom, #28b487 , #7dd56f );
    border: 1px solid #81bd81;" class="btn btn-primary d-inline-block ms-5 signup" type="submit" value="Sign Up">
                        </div>
                    </div>    
                    </form>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                            <p class="d-inline-block mt-3">If you already have an account? </p>&nbsp;&nbsp;&nbsp; <a
                                href="./index.html">
                                Signin</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>