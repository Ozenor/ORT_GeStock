<?php

class Models
{

    /**
     * Private methode for connect bdd
     * @return connection
     */
    protected static function bddConnect()
    {

        require_once('../../conf/decBdd.php');

        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        // $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        // Error treatment
        try {
            $dbConnect = new PDO('mysql:host=' . $host . ':3306;dbname=' . $dbName, $user, $pass, $options);
        } catch (PDOException $e) {
            $result = json_encode(
                array(
                    'controller' => $ctrl,
                    'status' => 'failed',
                    'result' => 'Erreur SQL dans le fichier ' . $e->getFile() . ' à la ligne ' . $e->getLine() . ' - ' . $e->getMessage()
                )
            );
            header('Content-Type: application/json; charset=utf-8');
            echo $result;
            exit();
        }
        // die('Models -> bddConnect');
        return $dbConnect;
    }
}
