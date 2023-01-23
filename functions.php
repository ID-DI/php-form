<?php 

function validateFiledEmptySignin() 
{
    if(empty($_POST['username']) || empty($_POST['password'])) 
    {
        setErrorMessage("Please fill all the fileds before submiting");
        redirect("signUp-page.php");
    }
}

function validateUsernameSpecialSign($username) 
{
    if(((preg_match('/[\'^£$%!?&*()}{@#~?><>,|=_+¬-]/', $username)) == true) || ($username == trim($username) && strpos($username, ' ') != false))
        {
        setErrorMessage ("Username cannot contain empty spaces or special signs");
        redirect("signUp-page.php");
        }
} 

function validatePassword($password)
{
    if( !preg_match('/[a-z]+/', $password)  
        || !preg_match('/[A-Z]+/', $password)
        || !preg_match('/[0-9]+/', $password)
        || !preg_match('/[!@#\$%\^&\*]+/', $password)) 
        {
            setErrorMessage ("Password must have at least one number, one special sign and one
            uppercase letter and has to be between 5 and 12 characters");
            redirect("signUp-page.php");
        }
}

function validateEmail($email) {
    $emailCheck= explode("@", $email);
    if(strlen($emailCheck[0]) < 5) 
        {
            setErrorMessage ("Email must have at least 5 characters before @");
            redirect("signUp-page.php");
        }
}

function getUsers() {
    $data = file_get_contents('user.txt');
    $data = trim($data);
    $data = explode(PHP_EOL, $data);
    return $data;
}

function findEmail($email)
{
    $Users = getUsers();
    foreach($Users as $user) 
    {
        $user = explode(",", $user);
        $userMail = [$user[0]];
        foreach($userMail as $usermail) 
        {
            if($usermail == $email) 
            {
                setErrorMessage ("A user with this email already exists");
                redirect("signUp-page.php");
            }
        }
    }
    return $email;
}

// LOGIN

function validateEmptyLogIn()
{
    // if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) 
    if(empty($_POST['username']) || empty($_POST['password'])) 
    {
        setErrorMessage("Please fill all the fileds before submiting");
        redirect("login-page.php");
    }
}

function confirmPassword($password)
{
 
    return $password;
}

function dashbordRoute($username) {
    setSuccessMessage("Welcome $username");
    redirect("dashbord.php");
}


function redirect($route) {
    header("Location: $route");
    die();
}
function redirectDash() {
    header("Location:dashbord.php");
    die;
}

function redirectHome() {
    redirect("index.php");
}

function setErrorMessage($msg) {
    $_SESSION['error'] = $msg;
}

function loginCheck()
{
    if (!isset($_SESSION['username'])) {
        $_SESSION['error'] = "Please log in first";
        redirect("login.php");
    }
}

function setSuccessMessage($msg) {
    $_SESSION['success'] = $msg;
}

function onlyPost() {
    if($_SERVER['REQUEST_METHOD'] !== 'POST') {
        setErrorMessage("Only POST requests allowed");
        redirectHome();
    }
}

function getAllUsers()
{
    $users = file_get_contents("users.txt");
    $data = trim($users);
    $data = explode(PHP_EOL, $users);
    return $data;
}

function findUser($username)
{
    $data = getAllUsers();
    foreach ($data as $user) {
        $userData = explode(",", $user);
        $userName = explode("=", $userData[1]);
        if ($userName[0] == $username) {
            return $userName;
        }
    }
    return true;
}

