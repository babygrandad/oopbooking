<?php 
include('filePaths.php');
require('classes/login.class.php');
?>
    
<?php
session_start();
if(isset($_SESSION['email'])){
    header('location: dashboard.php');
}

if(isset($_POST['login'])){
    $user = new LogInUser(
        $_POST['email'],
        $_POST['password'],
        $userData,
        $usersDataFile);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="position-absolute top-50 start-50 translate-middle">
<h3>Welcome to Hotel booking site</h3>
    <form action="index.php" method="POST" autocomplete="off" id="login-form">
            <div >
                <div class="formInput formDivision">
                    <label class="d-block">Email</label>
                    <input  class="col-12" type="email" name="email" value='<?php if (isset($_POST['login'])) {echo @$user->getEmail();} ?>'>
                </div>
                <div class="formInput formDivision">
                    <label class="d-block">Password</label>
                    <input class="col-12" type="password" name="password">
                    <p class="warnings text-danger"> <?php echo @$user->errors['password'] ?> </p>
                </div>
                <div class="formButton formDivision">
                    <input class="col-12" type="submit" value="Login" name="login">
                </div>
                <div class="formDivision formRedirect">
                    <p>Don't have an account?  <a href="register.php">Register here</a> </p>
                </div>
            </div>
        </form>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>