<?php
if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) 
{
    $signInError = true;
    $_SESSION['error'] = "Please fill all the fileds before submiting";
    header("Location:signUp-page.php");
    die;
}

if(((preg_match('/[\'^£$%!?&*()}{@#~?><>,|=_+¬-]/', $username)) == true) || ($username == trim($username) && strpos($username, ' ') != false))
    {
    $signInError = true;
     $_SESSION['error'] = "Username cannot contain empty spaces or special signs";
     header("Location:signUp-page.php");
    die;
    }

    $checkPassword = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*^[a-zA-Z0-9]).{5,12}$/m';
    if(preg_match_all($checkPassword, $password) == FALSE) 
        {
            $signInError = true;
            $_SESSION['error'] = "Password must have at least one number, one special sign and one
            uppercase letter and has to be between 5 and 12 characters";
            header("Location:signUp-page.php");
            die;
        }

$data = file_get_contents('user.txt');
$data = trim($data);
$Users = explode(PHP_EOL, $data);

foreach($Users as $user) 
{
    $user = explode(",", $user);
    $userMail = [$user[0]];
    $userName = [$user[1]];

    foreach($userMail as $usermail) 
    {
        if($usermail == $email) 
        {
            $signInError = true;
            $_SESSION['email'] = "A user with this email already exists";
            header("Location:signUp-page.php");
            die;
        }
    }
    foreach($userName as $userName) 
    {
        $userName = explode("=", $userName);
        if($userName[0] == $username) 
        {
            $signInError = true;
            $_SESSION['error'] = "Username taken. Please try diffrent username";
            header("Location:signUp-page.php");
            die;
        }
    }

}


foreach($Users as $user) 
{
    $user = explode(",", $user);
    $userMail = [$user[0]];
    $userName = [$user[1]];

    foreach($userMail as $usermail) 
    {
        if($usermail !== $email) 
        {
            $_SESSION['error'] = "You entered wrong email,please try again.";
            header("Location:login-page.php");
            die;
        }
    }
    foreach($userName as $userName) 
    {
        $userName = explode("=", $userName);
        if($userName[0] !== $username) 
        {
            $_SESSION['error'] = "This username does not exist in our database. Please try again.";
            header("Location:login-page.php");
            die;
        } 

        if(password_verify($password, $userName[1]))
    
        {
            $_SESSION['success'] = "Welcome $username";
            header("Location:dashbord.php");
            die;
        }
        else
        {
            $_SESSION['error'] = "You've entered wrong password. Please try again.";
            header("Location:login-page.php");
            die;  
        }
    }
}