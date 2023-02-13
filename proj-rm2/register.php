<?php
require_once('classes/register.class.php');
require_once('logic/enforceLogout.php');

if (isset($_POST['register'])) {
    $user = new RegisterUser(
        $_POST['fName'],
        $_POST['lName'],
        $_POST['email'],
        $_POST['password']
    );
}
?>

?>


<!DOCTYPE html>
<html lang="en">

<?php
require_once('templates/header.php');
echo(page_title('Sign Up'));
?>

<body>

    <main>
    <?php
    include_once('templates/containers.php');
    echo(open_form_container('Sign Up'));
    ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
        <div class="mb-4 form-floating">
            <input type="text" class="form-control" placeholder="First Name"  name="fName" value='<?php if (isset($_POST['Register'])) {echo @$user->getFname();} ?>'>
            <label for="" class="form-label">First Name</label>
            <span class="fs-6 text-danger"><?php echo @$user->errors['name'] ?></span>
        </div>
        <div class="mb-4 form-floating">
            <input type="text" class="form-control" placeholder="Last Name" name="lName" value='<?php if (isset($_POST['Register'])) {echo @$user->getLname();} ?>'>
            <label for="" class="form-label">Last Name</label>
            <span class="fs-6 text-danger"><?php echo @$user->errors['surname'] ?></span>
        </div>
        <div class="mb-4 form-floating">
            <input type="email" class="form-control" placeholder="Email" name="email" value='<?php if (isset($_POST['Register'])) {echo @$user->getEmail();} ?>'>
            <label for="" class="form-label">Email</label>
            <span class="fs-6 text-danger"><?php echo @$user->errors['email'] ?></span>
        </div>
        <div class="mb-4 form-floating">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <label for="" class="form-label">Password</label>
            <span class="fs-6 text-danger"><?php echo @$user->errors['password'] ?></span>
        </div>
        <div class="mb-4 form-group d-grid">
            <button class="btn btn-lg btn-secondary" type="submit" name="register">Sign up</button>
        </div>      
        <div class="mb-4 form-group">
        <label for="">Already have an account? <a href="index.php">Sign in</a></label>
        </div>
    </form>

    <?php close_continer()?>
    </main>

</body>


</html>