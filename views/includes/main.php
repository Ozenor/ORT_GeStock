<section id="corp" class="container-fluid" style="background: white;">

    <div class="row">
        <?php

        require_once("sideMenu.php");
        if ($connected) {
            switch ($page) {
                case 'addUser':
                    require_once("addUser.php");
                    break;
                case 'listUsers':
                    if (!isset($resultGetUsers) || empty($resultGetUsers)) {
                        $resultGetUsers = Controllers::getUsers();
                    }
                    require_once("listeUsers.php");
                    break;

                default:
                    if (!isset($resultGetProducts) || empty($resultGetProducts)) {
                        $resultGetProducts = Controllers::getProducts();
                    }
                    require_once("listedesproduits.php");
                    break;
            }
        } else {
            require_once("mainConnexion.php");
        }
        ?>






    </div>

</section>