<nav class="col-md-2 d-none d-md-block alert-secondary sidebar">
  <div class="sidebar-sticky">


    <div class="row border-bottom border-danger p-2 pl-4" id="log">
      <?php if ($connected) {
      ?>
        <i class="fas fa-user-check fb bg-light rounded p-3"></i>
      <?php } else { ?>
        <i class="fas fa-user fb bg-light rounded p-3"></i>
      <?php } ?>
      <div>
        <a class="nav-link pb-0 pl-1" href="#"><?php echo ($connected) ? $_SESSION['typeUser'] : 'guest' ?></a>
        <div class="row">
          <a class="nav-link pt-0 ml-1" href="#">Profil </a>
          <a class="nav-link pt-0" href="<?php echo ($connected) ? 'deconnexion.php' : '/index.php' ?>">
            <i class="fas fa-lock">&nbsp;</i><?php echo ($connected) ? 'Déconnexion' : 'Connexion' ?>
          </a>
        </div>
      </div>
    </div>
    <?php if ($connected) {
    ?>
      <ul class="nav flex-column text-center mt-4">
        <li class="nav-item row mx-auto">
          <i class="fas fa-desktop mt-1"></i>
          <p class="text-uppercase">&nbsp; Tableau de bord</p>
        </li>
        <li class="nav-item row mb-4">
          <a class="nav-link col-4 offset-1 bg-success rounded p-3" href="#">
            <i class="fas fa-shopping-cart fb mb-2"></i><br>Entrée
          </a><a class="nav-link col-4 offset-1 bg-danger rounded p-3" href="#">
            <i class="fas fa-shopping-cart fb mb-2"></i><br>Sortie
          </a>
        </li>
        <li class="nav-item row mb-4">
          <a class="nav-link col-4 offset-1 bg-primary rounded p-3" href="#">
            <i class="fas fa-user fb mb-2"></i><br>Utilisateurs
          </a> <a class="nav-link col-4 offset-1 bg-warning rounded p-3" href="#">
            <i class="fas fa-poll fb mb-2"></i><br>Statistique
          </a>
        </li>
        <li class="nav-item row mb-4">
          <a class="nav-link col-4 offset-1 bg-danger rounded p-3" href="#">
            <i class="fas fa-chart-bar fb mb-2"></i><br>Stock</a>
          <a class="nav-link col-4 offset-1 bg-secondary rounded p-3" href="#">
            <i class="far fa-clock fb mb-2"></i><br>Journal
          </a>
        </li>
        <li class="nav-item row mb-4">
          <a class="nav-link col-4 offset-1 bg-warning rounded p-3" href="#">
            <i class="fas fa-user fb mb-2"></i><br>Client
          </a><a class="nav-link col-4 offset-1 bg-info rounded p-3" href="#">
            <i class="fas fa-network-wired fb mb-2"></i><br>Categorie
          </a>
        </li>
      </ul>
    <?php } ?>
  </div>
</nav>