<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge 13-PHP</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>

  <body class="background container-fluid">
  <?php
          if(isset($_SESSION['error'])) {?>
          <div class="error text-center mt-5"><?= $_SESSION['error']?></div>
        <?php 
        unset($_SESSION['error']);
      }
        ?>
  <?php
          if(isset($_SESSION['email'])) {?>
          <div class="mail text-center mt-5"><?= $_SESSION['email']?></div>
        <?php 
        unset($_SESSION['error']);
      }
        ?>
    <div class="flex">
      
        <a href="signUp-page.php" type="button" class="text-decoration-none btn btn-outline-light mr-3 ">Sign Up</a>
        <a href="login-page.php" type="button" class="text-decoration-none btn btn-outline-light ml-3 px-3 ">Login</a>
    
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
      integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>
  </body>

</html>