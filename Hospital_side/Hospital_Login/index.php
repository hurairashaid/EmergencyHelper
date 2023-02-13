<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<?php 
 ini_set('display_errors', 1); 
 ini_set('display_startup_errors', 1); 
 error_reporting(E_ALL);
  include_once 'config.php';
if(isset($_SESSION["id"])){
    header("location: ../dashboard/index.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST['email'];
$sql = "SELECT id, email, passwords FROM hospital WHERE email = '$username'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
if(empty($data) === false){
     if($_POST['password'] == $data['passwords']){
      $_SESSION["id"] = $data['id'];
      header("location: ../dashboard/index.php");
    }else{
        $incorrect_password = "Please enter correct Password";
    }
}else{
    $incorrect_email="Please enter correct Emails";
}
}
?>

<body style="background-color: aquamarine;">
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
                            <h1 class="text-info">Choose Account</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <p class="text-secondary text-center">Hello Hospital!</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <p class="text-secondary text-center">
                            <?php 
                            if(isset($incorrect_email)){
                                echo $incorrect_email;
                            }else if(isset($incorrect_password)){
                                echo $incorrect_password;
                            }
                            ?>
                            </p>
                        </div>
                    </div>                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center">
                            <p class="text-secondary">Please fill out the form below to get started</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-2">
                            <div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-envelope"></i><input type="email" name="email" class="form-control ms-3" placeholder="Email" aria-label="First name"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                            <div class="row">
                                <div class="col">

                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i> <input type="password" name="password"
                                            class="form-control ms-3" placeholder="password"
                                            aria-label="First name"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 d-flex justify-content-center align-items-center mt-3">
                                <p class="d-inline-block mt-3">No account? </p>&nbsp;&nbsp;&nbsp; <a href="./signup.php">
                                    Signup</a>
                              <input type="submit" class="btn btn-primary d-inline-block ms-5" value="Login">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
</body>

</html>