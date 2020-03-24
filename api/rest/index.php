<?php
// header ('Location: /index.php');
// exit();
// $ctrl = $_REQUEST["ctrl"];
// echo $ctrl;


// General Configuration
require_once('../../conf/generalConf.php');
require_once('../../autoLoader/AutoLoad.php');
/**
 * Control access controleur
 * @param none
 * @return redirect is false
 */
// var_dump($_SERVER['SERVER_ADDR']);
// die();
$autorizedAccess = false;
$listAccessAutorized = array("127.0.0.1", "::1", "localhost", "10.120.3.16"); // 1,2,3 local wamp, 4 planet hoster
foreach ($listAccessAutorized as $valueAccess) {
    if ($valueAccess == $_SERVER['SERVER_ADDR'] or $valueAccess == $_SERVER['HTTP_HOST']) {
        $autorizedAccess = true;
    }
}
if ($autorizedAccess == false) {
    header('Location: unauthorizedAccess.php');
    exit();
}

/**
 * Control access is GET
 * @param key secure
 * @return require controller
 * Récupération de datas
 */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $keySecure = "cle1";
    require_once "controller/GetController.php";
}

/**
 * Control access is POST
 * @param key secure
 * @return require controller
 * Création de datas
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $keySecure = "cles2";
    require_once "controller/PostController.php";
}
/**
 * Control access is PUT
 * @param key secure
 * @return require controller
 * Mise a jour de datas
 */
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $keySecure = "cle3";
    // for put request
    parse_str(file_get_contents("php://input"), $post_vars);
    require_once "controller/PutController.php";
}
/**
 * Control access is DELETE
 * @param key secure
 * @return require controller
 * Supression de datas
 */
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $keySecure = "cle4";
    // for delete request
    parse_str(file_get_contents("php://input"), $post_vars);
    require_once "controller/DeleteController.php";
}
