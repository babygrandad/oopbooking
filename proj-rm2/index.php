<?php
require_once('classes/login.class.php');
require_once('logic/enforceLogout.php');

if(isset($_POST['login'])){
    $user = new LogInUser(
        $_POST['email'],
        $_POST['password']
);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
require_once('templates/header.php');
echo(page_title('Log in'));
?>
<body>

<main>
<?php
    include_once('templates/containers.php');
    echo(open_form_container('Log in'));
    ?>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="mb-4 form-floating">
            <input type="email" name="email" class="form-control" placeholder="Email" value='<?php if (isset($_POST['login'])) {echo @$user->getEmail();} ?>' >
            <label for="" class="form-label">Email</label>
            <span class="fs-6 "></span>
        </div>
        <div class="mb-4 form-floating">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <label for="" class="form-label">Password</label>
            <span class="fs-6 text-danger"><?php echo @$user->errors['password'] ?></span>
        </div>
        <div class="mb-4 form-group d-grid">
            <button class="btn btn-lg btn-secondary" type="submit" name="login">Sign in</button>
        </div>      
        <div class="mb-4 form-group">
            <label for="">Dont have an account? <a href="register.php">Sign Up</a></label>
        </div>
    </form>

<?php close_continer()?>
</main>

</body>


</html>