<?php
session_start();
require_once __DIR__ . "/functions.php";
onlyPost();

validateFiledEmptySignin();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

validateUsernameSpecialSign($username);

validatePassword($password);

findUser($username);

findEmail($email);

if ($user == true) {
    setErrorMessage("Username taken");
    redirect("signUp-page.php");
}

$password_hash = password_hash($password, PASSWORD_BCRYPT);

$usersData = $email . "," . $username . "=" .$password_hash . PHP_EOL;

if(file_put_contents("user.txt", $usersData, FILE_APPEND)) 
{   
    $_SESSION['username'] = $username;
    setSuccessMessage("Welcome $username");
    redirectDash();
} 
else 
{
    setErrorMessage("An error occured while creating account");
    header("Location:signUp-page.php");
    die;
}
