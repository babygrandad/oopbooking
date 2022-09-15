<?php
// error_reporting(E_ALL & ~E_NOTICE);
session_start();
if(!isset($_SESSION['email'])){
    header('location: index.php');
}
$fName = $_SESSION['fName'];
$lName = $_SESSION['lName'];
$email = $_SESSION['email'];
include('filePaths.php');

?>


<?php
class CompareHotels
{

    // properties
    private $hotelName, $checkinDate, $checkoutDate, $stayDuration;
    public $errors = array("hotle" => '', "checkin" => '', "stay" => '');

    function __construct($hotelName, $checkinDate, $checkoutDate)
    {
        $this->hotelName = $hotelName;
        $this->checkinDate = $checkinDate;
        $this->checkoutDate = $checkoutDate;

        $this->setSession();
    }

    private function setSession()
    {
        $_SESSION['hotel'] = $this->hotelName;
        $_SESSION['checkin'] = $this->checkinDate;
        $_SESSION['checkout'] = $this->checkoutDate;

        header('location: compare.php');
    }
}
?>

<?php
if (isset($_POST['compare'])) {
    $user = new CompareHotels(
        $_POST['hotels'],
        $_POST['checkinDate'],
        $_POST['checkoutDate'],
    );
}

if (isset($_POST['logout'])) {
    header('location: logout.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/form.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" crossorigin="anonymous" defer></script>
</head>

<body>
    <header class="row">
        <nav class="navbar bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Welcome</a>
                <div class="d-flex" role="search">
                    <form action="compare.php" method="post">
                        <button name='logout' onclick="this.form.submit()">Log Out</button>
                        <span class="nameSpace"> <?php echo "Hi " . ucfirst($fName) . " " . ucfirst($lName) ?> </span>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="position-absolute top-50 start-50 translate-middle">
            <h3>Please select your stay.</h3>
            <form action="dashboard.php" method="post" id="compareForm">
                <div class="formInput formDivision">
                    <label class="d-block">Hotel</label>
                    <select class="col-12 mb-3" name="hotels" id="hotels">
                        <option value='' disabled selected>Choose from here</option>
                        <?php
                        foreach ($hotelData as $hotel) {
                            echo '<option value="' . $hotel['name'] . '">' . $hotel['name'] . '</option>';
                        }
                        ?>
                    </select>
                    <span class="text-danger" id="hotelWarning"></span>
                </div>
                <div class="formInput formDivision">
                    <label class="d-block">Check in date</label>
                    <input class="col-12 mb-3" type="date" name="checkinDate" id="checkInDate">
                    <span class="text-danger" id="inDateWarning"></span>
                </div>
                <div class="formInput formDivision">
                    <label class="d-block">Check out date</label>
                    <input class="col-12 mb-3" type="date" name="checkoutDate" id="checkOutDate">
                    <span class="text-danger" id="outDateWarning"></span>
                </div>
                <div class="formInput formDivision">
                    <label class="d-block">Stay Duration</label>
                    <input  class="col-12 mb-3"type="number" name="stayDuration" disabled id="stayDuration">
                    <span class="text-danger" id="stayWarning"></span>
                </div>
                <div class="formInput formDivision">
                    <label class="d-block"></label>
                    <input class="col-12" type="submit" name="compare" id="compare" value="Compare">
                </div>
            </form>
                </main>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="js/dashboard.script.js"></script>
</body>

</html>