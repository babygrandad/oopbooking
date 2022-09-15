<?php
include('filePaths.php');
require('classes/register.class.php');
?>

<?php
session_start();
if(isset($_SESSION['email'])){
    header('location: dashboard.php');
}

if (isset($_POST['Register'])) {
    $user = new RegisterUser(
        $_POST['fName'],
        $_POST['lName'],
        $_POST['email'],
        $_POST['password'],
        $userData,
        $usersDataFile
    );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="position-absolute top-50 start-50 translate-middle">
        <h3>Welcome to hotel booking site</h3>
        <form action="register.php" method="POST" autocomplete="off" auto>
            <div class="formInput formDivision">
                <label class="d-block">Name</label>
                <input class="col-12"type="text" name="fName" value='<?php if (isset($_POST['Register'])) {echo @$user->getFname();} ?>'>
                <p class="warnings text-danger"> <?php echo @$user->errors['name'] ?> </p>
            </div>
            <div class="formInput formDivision">
                <label class="d-block">Surname</label>
                <input class="col-12" type="text" name="lName" value='<?php if (isset($_POST['Register'])) {echo @$user->getLname();} ?>'>
                <p class="warnings text-danger"> <?php echo @$user->errors['surname'] ?> </p>
            </div>
            <div class="formInput formDivision">
                <label class="d-block">Email</label>
                <input class="col-12"type="text" name="email" value='<?php if (isset($_POST['Register'])) {echo @$user->getEmail();} ?>'>
                <p class="warnings text-danger"> <?php echo @$user->errors['email'] ?> </p>
            </div>
            <div class="formInput formDivision">
                <label class="d-block">Password</label>
                <input class="col-12"type="password" name="password">
                <p class="warnings text-danger"> <?php echo @$user->errors['password'] ?> </p>
            </div>
            <div class="formButton formDivision">
                <input class="col-12"type="submit" value="Resgister" name="Register">
            </div>
            <span class="warnings"> <?php echo @$user->errors['registration'] ?> </span>
            <div class="formDivision formRedirect">
                <p>Already have an account?  <a href="index.php">Login here</a> </p>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>