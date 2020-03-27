<?php
// Lancement de la session
session_start();
// Encodage de la page
header("Content-Type: text/html; charset=utf-8");
// Conf générale
require_once("../conf/generalConf.php");
// Autoloader global
require_once(PATH_MACHINE . "autoLoader/AutoLoad.php");
// Pour afficher les erreurs php
if (MODE_TEST == 1) {
    // echo "Test activé <br>";
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}



// Sécurisation des vars reçus
// var_dump($_REQUEST);
$arrayVar = Controllers::secureArray($_REQUEST);
// var_dump($arrayVar);
// connexion
$connected = Controllers::verifConnexionUser();
$echecConnexion = '';
if (
    !$connected
    && isset($_SESSION['email']) && !empty($_SESSION['email'])
    && isset($_SESSION['mdp']) && !empty($_SESSION['mdp'])
) {
    $resultGetUsers = Controllers::getUsers();
    //var_dump($resultGetUsers);
    if ($resultGetUsers->status == "failed") {
        die("Une erreur est survenue");
    } elseif ($resultGetUsers->status == "success") {
        foreach ($resultGetUsers->result as $value) {
            //var_dump($value->email);
            if ($value->email == $_SESSION['email'] && $value->mot_de_passe == $_SESSION['mdp']) {
                foreach ($value as $key => $val) {
                    // echo $key . 'User';
                    $_SESSION[$key . 'User'] = $val;
                    // var_dump($_SESSION[$key . 'User']);
                }
                $connected = true;
                $resultGetProducts = Controllers::getProducts();
                break;
            }
        }
        if (!$connected) {
            $echecConnexion = "Erreur dans le login ou le mot de passe";
        }
    } else {
        die("Erreur critique");
    }
    unset($_SESSION['email']);
    unset($_SESSION['mdp']);
} else if ($connected) {

    $resultGetUsers = Controllers::getUsers();
    $resultGetProducts = Controllers::getProducts();
}


// Appel Header
require_once("includes/header.php");
// Appel Body
require_once("includes/main.php");
// Appel Footer
require_once("includes/footer.php");
