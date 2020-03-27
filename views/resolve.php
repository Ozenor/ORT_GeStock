<?php
// Lancement de la session
session_start();
// Conf générale
require_once("../conf/generalConf.php");
// Autoloader global
require_once(PATH_MACHINE . "autoLoader/AutoLoad.php");

$arrayVar = Controllers::secureArray($_POST);
foreach ($arrayVar as $key => $value) {
    $_SESSION[$key] = $value;
}


header('Location: /index.php');
exit();
