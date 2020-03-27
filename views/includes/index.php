
    <?php
// Lancement de la session
session_start();
// Encodage de la page
header ("Content-Type: text/html; charset=utf-8");
// Conf générale
require_once ("../conf/generalConf.php");
require_once (PATH_MACHINE."autoLoader/AutoLoad.php");

//Pour afficher les erreurs php
if (MODE_TEST==0) {
    //echo "Test activé <br>";
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    }

// Sécurisation des vars reçus
$arrayVar = Controllers::secureArray($_REQUEST);

// Le formulaire permet delancer une demande d'authentification

// Cette demande est traité par index.php dans views

// Detecter si le formulaire a été lancer (if action=="auth")

// Detecter si les variables envoyé par le formulaire na sont pas vide  (email et pass pas vide)


// Appeler un controller "verifUserIfExist" qui sera dans Controllers.php de l'application
    //  ==> le controller "verifUserIfExist" va appeler l'API pour récupérer la liste des users,
    // vous parcourez la liste des resultats
    // et il va comparer les resultats pour vérifier si il trouve bien  : email + mot de passe.
    // si il trouve email et pass
    // va renvoyer les données de l'utilsateur 
    // $_SESSION["idUser"] = id
    // $_SESSION["nameUser"]
    // $_SESSION["lastNameUser"]
    // $_SESSION["emailUser"]
    // $_SESSION["typeUser"]


   //Connexion
// test connexxion
$_SESSION['idUser'] = "1";
$connected = Controllers::verifConnexionUser();

//demande d'authentification

if (isset($_POST['mdp']) AND $_POST['mdp'] == 1234)
{
    echo "Mot de passe correcte";
}
elseif (isset($_POST['mdp']) AND $_POST['mdp'] != 1234)
{
 echo "Mot de passe incorrect!";
}


$action = Controllers::verifUserIfExist();


// if ($action=="auth") {
//     die ("Une erreur est survenue !");
// }  elseif($action->status=="success") {
    
// }

//Test d'API
$param = "?ctrl=getUsers";
$resultGetCurl = Controllers::getCurlRest($param);
$resultGetCurl = json_decode($resultGetCurl);

if ($resultGetCurl->status=="failed") {
    die ("Une erreur est survenue ! Veuillez contacter le support technique!");
} elseif($resultGetCurl->status=="success") {
   // echo "<pre>";
   // var_dump($resultGetCurl->result);
   // echo "</pre>";
    //echo $resultGetCurl->result->email;
} else {
    die ("Erreur critique");
}

require_once ("header.php");
require_once ("main.php");
require_once ("footer.php"); 






/*if (MODE_TEST==1) {
   echo "Test activé : ".HOST_DATABASE."<br>";
   } else {
   echo "Pas de test activé : ".EMAIL_SUPPORT_TECH."<br>";
   }*/
   

 
   //for ($i = 1; $i <= 5; $i++) {
      //echo $i."<br>";
      //}
      
//echo EMAIL_SUPPORT_TECH;

//echo $_SERVER['PHP_SELF']."<br>";
   // exit();
   
   