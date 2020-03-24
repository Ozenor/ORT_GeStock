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
    && isset($arrayVar['inputEmail']) && !empty($arrayVar['inputEmail'])
    && isset($arrayVar['inputPassword']) && !empty($arrayVar['inputPassword'])
) {
    // Test API
    $param = "?ctrl=getUsers";
    //$param = "?ctrl=processApi";
    $resultGetCurl = Controllers::getCurlRest($param);
    $resultGetCurl = json_decode($resultGetCurl);
    //var_dump($resultGetCurl);
    if ($resultGetCurl->status == "failed") {
        die("Une erreur est survenue");
    } elseif ($resultGetCurl->status == "success") {
        foreach ($resultGetCurl->result as $value) {
            //var_dump($value->email);
            if ($value->email == $arrayVar['inputEmail'] && $value->mot_de_passe == $arrayVar['inputPassword']) {
                foreach ($value as $key => $val) {
                    // echo $key . 'User';
                    $_SESSION[$key . 'User'] = $val;
                    // var_dump($_SESSION[$key . 'User']);
                }
                $connected = true;
                break;
            }
        }
        if (!$connected) {
            $echecConnexion = "Erreur dans le login ou le mot de passe";
        }
    } else {
        die("Erreur critique");
    }
} else if ($connected) {
    // Test API
    $param = "?ctrl=getUsers";
    $resultGetCurl = Controllers::getCurlRest($param);
    $resultGetCurl = json_decode($resultGetCurl);
}


// Appel Header
require_once("includes/header.php");
// Appel Body
require_once("includes/main.php");
// Appel Footer
require_once("includes/footer.php");
