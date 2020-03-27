<main class="container-fluid">
    <div class="row">
        <?php
        // Appel asideMenu
        require_once("aside.php");

        // Appel sectionMain
        if ($connected) {
            require_once("sectionCenter.php");
        } else {
            require_once("sectionConnexion.php");
        }
        ?>
    </div>
</main>