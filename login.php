<?php
session_start();
require_once __DIR__ . "/functions.php";
onlyPost();

validateEmptyLogIn();

    $username = $_POST['username'];
    $password = $_POST['password'];

// confirmUsername($username);
$data = file_get_contents('user.txt');
$data = trim($data);
$data = explode(PHP_EOL, $data);

foreach($data as $user){
    $userData = explode(",", $user);
    $userName = explode("=", $userData[1]);
    if ($userName[0] == $username) {
        $_SESSION['username'] = $username;
        redirectDash();
    }
}

$userData = $data;
$userDataPersonal = explode("=", $userData[1]);
$userName = [$userDataPersonal[0]];
$userPass = [$userDataPersonal[1]];

foreach($userPass as $key=>$value)
    {
        if(password_verify($password, $value))
        {
            $_SESSION['success'];
            header("Location:dashbord.php");  
        }
        else
        {
            setErrorMessage("You've entered wrong password. Please try again.");
            header("Location:login-page.php");
            
        }
    }

    foreach($userPass as $key=>$value)
    {
        if(strcmp($value, $username) !== 0)
        {
            setErrorMessage("This username does not exist in our database. Please try again.");
            redirect("login-page.php");
        }
    }