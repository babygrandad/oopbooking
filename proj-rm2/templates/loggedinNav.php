<nav class="navbar navbar-expand-lg bg-secondary navbar-dark" aria-label="Thirteenth navbar example">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse d-lg-flex collapse show" id="navbarsExample11" >
          <a class="navbar-brand col-lg-3 me-0" href="#">Welcome</a>
          <ul class="navbar-nav col-lg-6 justify-content-lg-center">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="dashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bookStay.php">Book now</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="compare.php">Compare</a>
            </li>
          </ul>
          <form class="d-lg-flex col-lg-3 justify-content-lg-end text-light" action="logic/logout.php" method="post">
            <label class="form-label me-2">Hi <?= $fName." ".$lName ?></label>
            <button class="btn btn-primary" name='logout' type="submit">Log Out</button>
          </form>
        </div>
      </div>
    </nav>