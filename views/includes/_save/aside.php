<!-- <aside> -->
<div class="">
    <nav class="navbar navbar-expand-md col-up-to-md-12 flex-column bg-col-gray p-0">
        <div id="sideMenu" class="collapse navbar-collapse flex-column justify-content-start py-2">
            <div class="w-100 px-1 border-bottom border-warning">
                <div class="container-fluid">
                    <div class="w-100 row justify-content-around">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="fas fa-user fa-3x"></i>
                        </div>
                        <div class="d-flex flex-column justify-content-end align-items-center text-right">
                            <p class="mb-1"><b><?php echo ($connected) ? $_SESSION['typeUser'] : 'guest' ?></b></p>
                            <a class="mb-1 text-secondary" href="#">Profil</a>
                            <p class="mb-1 d-inline-block text-secondary"><small><a class="text-muted" href="<?php echo ($connected) ? 'deconnexion.php' : '/index.php' ?>"><i class="fas fa-lock"></i> <?php echo ($connected) ? 'Déconnexion' : 'Connexion' ?></a></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column mb-auto">
                <div class="text-center">
                    <h5 class="mt-2"><i class="text-danger fas fa-desktop"></i> Tableau de bord</h5>
                </div>
                <div class="d-flex justify-content-around px-3">
                    <button class="btn btn-green btn-square rounded-0 m-1 p-0" href="#" <?php echo (!$connected) ? 'disabled' : '' ?>><i class="fas fa-shopping-cart fa-2x"></i><br>Entrée</button>
                    <button class="btn btn-orange btn-square rounded-0 m-1 p-0" href="#" <?php echo (!$connected) ? 'disabled' : '' ?>><i class="fas fa-shopping-cart fa-2x"></i><br>Sortie</button>
                </div>
                <div class="d-flex justify-content-around px-3">
                    <button class="btn btn-purple btn-square rounded-0 m-1 p-0" href="#" <?php echo (!$connected) ? 'disabled' : '' ?>><i class="fas fa-user fa-2x"></i><br>Utilisateurs</button>
                    <button class="btn btn-pink btn-square rounded-0 m-1 p-0" href="#" <?php echo (!$connected) ? 'disabled' : '' ?>><i class="far fa-chart-bar fa-2x"></i><br>Statistiques</button>
                </div>
                <div class="d-flex justify-content-around px-3">
                    <button class="btn btn-orange btn-square rounded-0 m-1 p-0" href="#" <?php echo (!$connected) ? 'disabled' : '' ?>><i class="fas fa-table fa-2x"></i><br>Stock</button>
                    <button class="btn btn-teal btn-square rounded-0 m-1 p-0" href="#" <?php echo (!$connected) ? 'disabled' : '' ?>><i class="far fa-clock fa-2x"></i><br>Journal</button>
                </div>
                <div class="d-flex justify-content-around px-3">
                    <button class="btn btn-red btn-square rounded-0 m-1 p-0" href="#" <?php echo (!$connected) ? 'disabled' : '' ?>><i class="fas fa-user fa-2x"></i><br>Client</button>
                    <button class="btn btn-cyan btn-square rounded-0 m-1 p-0" href="#" <?php echo (!$connected) ? 'disabled' : '' ?>><i class="fas fa-sitemap fa-2x"></i><br>Catégorie</button>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- </aside> -->