<div class="col-lg-3">
        <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width:250px;">
      <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
          <a class="nav-link link-dark" href="../index.html"><i class="bi bi-house-door m-1"></i>Home</a>
        <li class="nav-item">
            <a class="nav-link <?php echo  (isset($_GET['x']) && $_GET['x']=='home') ? 'active link-light' : 'link-dark' ;?>" aria-current="page" href="index.php?x=home">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link   <?php echo  (isset($_GET['x']) && $_GET['x']=='daftar') ? 'active link-light' : 'link-dark' ;?>" aria-current="page" href="daftar_menu.php?x=daftar"></i>Daftar Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo (isset($_GET['x']) && $_GET['x']=='kategori') ? 'active link-light' : 'link-dark' ;?>" aria-current="page" href="logout.php" onclick="return confirm('Ingin Logout?')"i class="b bi-house-door">Logout</a>
          </li>
          <li class="nav-item">
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
        </div>