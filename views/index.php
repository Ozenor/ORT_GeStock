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
            if ($value->email == $_SESSION['email'] &&  hash('sha512', $_SESSION['mdp']) == $value->mot_de_passe) {
                foreach ($value as $key => $val) {
                    // echo $key . 'User';
                    $_SESSION[$key . 'User'] = $val;
                    // var_dump($_SESSION[$key . 'User']);
                }
                $connected = true;
                // $resultGetProducts = Controllers::getProducts();
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
} else if (
    $connected &&
    isset($_SESSION['actionSend']) && !empty($_SESSION['actionSend'])
) {
    switch ($_SESSION['actionSend']) {
        case 'addUser':
            if (
                isset($_SESSION['addNom']) && !empty($_SESSION['addNom'])
                && isset($_SESSION['addPrenom']) && !empty($_SESSION['addPrenom'])
                && isset($_SESSION['addEmail']) && !empty($_SESSION['addEmail'])
                && isset($_SESSION['addMdp']) && !empty($_SESSION['addMdp'])
                && isset($_SESSION['addType']) && !empty($_SESSION['addType'])
            ) {
                $user = array();
                $user['addNom'] = $_SESSION['addNom'];
                $user['addPrenom'] = $_SESSION['addPrenom'];
                $user['addEmail'] = $_SESSION['addEmail'];
                $user['addMdp'] = $_SESSION['addMdp'];
                $user['addType'] = $_SESSION['addType'];
                $user['addActif'] = "1";

                $resultAddUser = Controllers::addUser($user);

                unset($_SESSION['addNom']);
                unset($_SESSION['addPrenom']);
                unset($_SESSION['addEmail']);
                unset($_SESSION['addMdp']);
                unset($_SESSION['addType']);

                if ($resultAddUser->status == "failed") {
                    die($resultAddUser->result);
                }
                $arrayVar['page'] = "listUsers";
            } else {
                $echecConnexion = "Erreur dans les parametres de l'ajout utilisateur";
                $arrayVar['page'] = "addUser";
                break;
            }
            $resultGetUsers = Controllers::getUsers();
            break;

        case "deleteProduct":
            if (
                isset($_SESSION['id']) && !empty($_SESSION['id'])
            ) {
                $resultDeleteProduct = Controllers::deleteProduct(array('id' => $_SESSION['id']));

                if ($resultDeleteProduct->status == "failed") {
                    die($resultDeleteProduct->result);
                }
                $arrayVar['page'] = "listedesproduits";
            } else {
                $echecConnexion = "Erreur de suppression de produits";
                $arrayVar['page'] = "listedesproduits";
                break;
            }
            $resultGetUsers = Controllers::getUsers();
            break;

        case "deleteUser":
            if (
                isset($_SESSION['id']) && !empty($_SESSION['id'])
            ) {
                $resultDeleteUser = Controllers::deleteUser(array('id' => $_SESSION['id']));

                if ($resultDeleteUser->status == "failed") {
                    die($resultDeleteUser->result);
                }
                $arrayVar['page'] = "listUsers";
            } else {
                $echecConnexion = "Erreur de suppression d'utilisateur'";
                $arrayVar['page'] = "listUsers";
                break;
            }
            $resultGetUsers = Controllers::getUsers();
            break;

        default:
            $resultGetProducts = Controllers::getProducts();
            break;
    }
    // $resultGetUsers = Controllers::getUsers();

    unset($_SESSION['actionSend']);
} else if ($connected) {

    // $resultGetUsers = Controllers::getUsers();
    $resultGetProducts = Controllers::getProducts();
}

$page = "";
if ($connected && isset($arrayVar['page']) && !empty($arrayVar['page'])) {
    $page = $arrayVar['page'];
}




// Appel Header
require_once("includes/header.php");
// Appel Body
require_once("includes/main.php");
// Appel Footer
require_once("includes/footer.php");
