<?php class CompareHotels
{

    // properties
    private $hotelName, $checkinDate, $checkoutDate, $stayDuration;
    public $errors = array("hotel" => '', "checkin" => '', "stay" => '');

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