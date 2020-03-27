<?php
// Lancement de la session
session_start();

// Conf générale
require_once("../conf/generalConf.php");
// Autoloader global
require_once(PATH_MACHINE . "autoLoader/AutoLoad.php");

if (Controllers::verifConnexionUser()) {
    unset($_SESSION['idUser']);
    unset($_SESSION["nomUser"]);
    unset($_SESSION["prenomUser"]);
    unset($_SESSION["emailUser"]);
    unset($_SESSION["typeUser"]);
    unset($_SESSION["mot_de_passeUser"]);
    unset($_SESSION["actifUser"]);
}
header('Location: index.php');
exit();
