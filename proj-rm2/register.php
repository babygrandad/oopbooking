<?php
require_once('classes/register.class.php');
require_once('logic/enforceLogout.php');
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
        <div class="mb-5 form-floating">
            <input type="text" name="firstName" id="" class="form-control" placeholder="First Name">
            <label for="" class="form-label">First Name</label>
            <span class="fs-6 "></span>
        </div>
        <div class="mb-5 form-floating">
            <input type="text" name="lastName" id="" class="form-control" placeholder="Last Name">
            <label for="" class="form-label">Last Name</label>
            <span class="fs-6 "></span>
        </div>
        <div class="mb-5 form-floating">
            <input type="email" name="email" id="" class="form-control" placeholder="Email">
            <label for="" class="form-label">Email</label>
            <span class="fs-6 "></span>
        </div>
        <div class="mb-5 form-floating">
            <input type="password" name="password" id="" class="form-control" placeholder="Password">
            <label for="" class="form-label">Password</label>
            <span class="fs-6 "></span>
        </div>
        <div class="mb-5 form-group d-grid">
            <button class="btn btn-lg btn-secondary" type="submit" name="register">Sign up</button>
        </div>      
        <div class="mb-5 form-group">
        <label for="">Already have an account? <a href="index.php">Sign in</a></label>
        </div>
    </form>

    <?php close_continer()?>
    </main>

</body>


</html>