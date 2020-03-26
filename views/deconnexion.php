<?php
// Lancement de la session
session_start();

// Conf générale
require_once("../conf/generalConf.php");
// Autoloader global
require_once(PATH_MACHINE . "autoLoader/AutoLoad.php");

if (Controllers::verifConnexionUser()) {
    unset($_SESSION['idUser']);
    unset($_SESSION["nameUser"]);
    unset($_SESSION["lastNameUser"]);
    unset($_SESSION["emailUser"]);
    unset($_SESSION["typeUser"]);
}
header('Location: index.php');
exit();
