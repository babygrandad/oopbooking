<?php
session_start();
require_once('logic/enforceLogin.php');
require_once('logic/sessionLogic.php');
?>


<!DOCTYPE html>
<html lang="en">

<?php
require_once('templates/header.php');
echo(page_title('Profile Update'));
?>

<body>
<?php
    require_once('templates/loggedinNav.php');
    include_once('templates/containers.php');
    ?>
<main>

<?php echo(open_form_container('Update personal Details'));?>

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
        <div class="mb-5 form-group d-grid gap-3">
            <button class="btn btn-lg btn-success" type="submit" name="updateProfile">Update</button>
            <button class="btn btn-lg btn-secondary">Cancel</button>
        </div>      
    </form>

    <?php echo(close_continer())?>
</main>

</body>


</html>