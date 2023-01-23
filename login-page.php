<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>

  <body class="background container-fluid">
    <h2 class="text-center mt-2 text-danger font-weight-bold mb-0">Login Form</h2>
    <?php
          if(isset($_SESSION['error'])) {?>
          <div class="error text-center mt-5"><?= $_SESSION['error']?></div>
        <?php 
        unset($_SESSION['error']);
      }
        ?>
    <div class="container flex text-center">
    <?php 
        if(isset($_SESSION['error'])){ ?>
          <p class='alert text-white bg-danger border-danger'><?php echo $_SESSION['error'] ?></p>
          <?php unset($_SESSION['error']);
        }
    ?>
      <form method = "POST" action="login.php">
        <div class="input-group mt-0">
        <input type="text" aria-label="username" name="username" class="form-control mr-2 common" placeholder="Username...">
          <input type="password" aria-label="password" name="password" class="form-control mr-2 common" placeholder="Password...">
      
        </div>
      <button type="submit" class="btn btn-outline-light mt-2 py-1 px-4 mr-2">Submit</button>
      </form>
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