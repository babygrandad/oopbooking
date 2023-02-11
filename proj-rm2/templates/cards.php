<?php
require_once('logic/fetchJSON.php');

foreach (get_hotels() as $hotel) {
    $hotelName = $hotel['name'];
    $imageName = $hotel['image_name'];
    $hotelDiscription = $hotel['description'];
?>

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4 ratio ratio-4x3">
                <img src="assets/images/hotel-cards/<?= $imageName ?>" class="img-fluid rounded-start" alt="<?= $hotelName ?>">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $hotelName ?></h5>
                    <p class="card-text"><?= $hotelDiscription ?></p>
                    <a href="bookStay.php?hotel_name=<?= $hotelName ?>">
                        <button class="btn btn-primary">Book Now</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
}
?>