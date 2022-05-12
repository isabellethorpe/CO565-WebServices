

<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Munched</a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if ($_SESSION['user_type'] == "admin") { ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="meals.php">Meals</a>
          </li>
        <?php } ?>
        <?php if ($_SESSION['user_type'] == "parent") { ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="children.php">Children</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="details.php">My details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Logout (<?= $_SESSION['user_type'] ?>)</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>