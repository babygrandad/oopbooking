<?php
session_start();
require_once('logic/enforceLogin.php');
require_once('logic/updateProfile.php');

if(isset($_POST['updateProfile'])){
    update_user(
        $_POST['email'],
        $_POST['firstName'],
        $_POST['lastName']
    );
    
    $_SESSION['fName'] = $_POST['firstName'];
    $_SESSION['lName'] = $_POST['lastName'];
}

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
            <input type="text" name="firstName" id="" class="form-control" placeholder="First Name" value="<?= $fName?>">
            <label for="" class="form-label">First Name</label>
            <span id="updateWarningFname" class="fs-6 text-danger"></span>
        </div>
        <div class="mb-5 form-floating">
            <input type="text" name="lastName" id="" class="form-control" placeholder="Last Name" value="<?= $lName?>">
            <label for="" class="form-label">Last Name</label>
            <span id="updateWarningLname" class="fs-6 text-danger"></span>
        </div>
        <div class="mb-5 form-floating">
            <input type="email" name="email" id="" class="form-control" placeholder="Email" value="<?= $email?>" readonly>
            <label for="" class="form-label">Email / ID</label>
            <span class="fs-6 "></span>
        </div>
        <div class="mb-5 form-group d-grid gap-3">
            <button class="btn btn-lg btn-success" type="submit" name="updateProfile">Update</button>
            <a href="dashboard.php" class="btn btn-lg btn-secondary">Cancel</a>
        </div>      
    </form>

    <?php echo(close_continer())?>
</main>

</body>


</html>