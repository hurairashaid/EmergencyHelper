<!DOCTYPE html>
<?php

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>My Website</title>
    <link rel="stylesheet" href="./style.css" />
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
  </head>
  <body>
    <main>
      <div class="firstsection">
        <h1>Welcome to Emergency Helper</h1>
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text ever
          since the 1500s
        </p>
      </div>
      <div class="secondsection">
        <div class="inner_element">
          <div class="hospital" onclick="location.href='./Hospital_side/Hospital_Login/index.php';">
            <div>
              <img src="hospital.png" />
            </div>
            <div>
              <h1>Hospital Mangement</h1>
              <p>manage your emergency room with us</p>
            </div>
          </div>
          <div
            onclick="location.href='./Client_side/client.php';"
            class="client"
          >
            <div>
              <img src="ambulance.png" />
            </div>
            <div>
              <h1>Emergency available</h1>
              <p>search availble emergency near you</p>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="index.js"></script>
  </body>
</html>
