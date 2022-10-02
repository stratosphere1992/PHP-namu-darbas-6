<?php
 
session_start();
 
if (login_failed)
{
    $_SESSION["login_attempts"] += 1;
}

if (isset($_SESSION["locked"]))
{
    $difference = time() - $_SESSION["locked"];
    if ($difference > 60)
    {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempts"]);
    }
}

if ($_SESSION["login_attempts"] > 2)
{
    $_SESSION["locked"] = time();
    echo "Please wait for 60 seconds";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form class="thisForm" method="post" action="index.php">
        <input type="text" name="name" placeholder="name">
        <input type="password" name="password" placeholder="password">
        <button type="submit" name="press" <?php if ($_SESSION["login_attempts"] > 2)
{
    $_SESSION["locked"] = time();
    echo "Please wait for 30 seconds";
} ?>>Login</button>
    </form>
<?php 

$name = $_POST["name"];
$password = $_POST["password"];


if(isset($_POST['name']) && isset($_POST['password'])){

    if($name == "Admin" && $password == "123456")
    {
        header('Location: profile.php');
        setcookie('name', $_POST['name'], time() + (86400 * 30), "/");
    }

}

if(isset($_COOKIE['name'])) {
echo '<style>.thisForm {display:none;}</style>';
}

?>

</body>
</html>