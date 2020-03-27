<section id="corp" class="container-fluid" style="background: white;">

    <div class="row">
        <?php

        require_once("sideMenu.php");
        if ($connected) {
            require_once("listedesproduits.php");
        } else {
            require_once("mainConnexion.php");
        }
        ?>






    </div>

</section>