<?php
class Controllers
{

    /**
     * Treatment response
     * @param string $result
     * @return json reponse
     */
    protected function responseResult($result)
    {
        $result = json_encode($result);
        header('Content-Type: application/json; charset=utf-8');
        echo $result;
        exit();
    }

    /**
     * Treatment and try catch for query
     * 
     * @param PdoQuery $query => the query
     * @param array $param => param to pass to query
     * @param string $ctrl => name of the controler
     */
    protected function tryCatchError($action, $param, $ctrl)
    {
        try {
            $action->execute($param);
        } catch (PDOException $e) {
            $this->responseResult(
                array(
                    'controller' => $ctrl,
                    'status' => 'failed',
                    'param' => $param,
                    'action' => $action,
                    'result' => 'Erreur SQL dans le fichier ' . $e->getFile() . ' à la ligne ' . $e->getLine() . ' - ' . $e->getMessage()
                )
            );
        }
    }

    /**
     * Create an array with array for each column, match key and value
     * 
     * @param object PDO $query
     * @return array of all result match key and value
     */
    protected function allInObject($query)
    {
        // Initialize var
        $tabResult = array();
        while ($queryFetch = $query->fetch(PDO::FETCH_ASSOC)) {
            foreach ($queryFetch as $key => $value) {
                $array[$key] = $value;
            }
            $tabResult[] = $array;
        }
        return $tabResult;
    }

    /**
     * Control vars
     * @param string $varOne, $varTwwo
     * @return result true or false
     */
    protected function controlVars($varOne, $varTwo)
    {
        $result = false;
        if ($varOne == $varTwo) {
            $result = true;
        }
        return $result;
    }

    /**
     * Control all results in object
     * @param object $objectControl
     * @return result ok or ko
     */
    protected function objectControl($objectControl)
    {
        $result = false;
        foreach ($objectControl as $key => $value) {
            if ($value == 1) {
                $result = "ok";
            } else {
                $result = "ko";
                break;
            }
        }
        return $result;
    }
    /**
     * Sécurise les champs d'un formulaire
     *
     * @param string => Données du champs
     * @return string => Données du champs après sécurisation : supprime les balises HTML et PHP d'une chaine de caractère,
     * remplace les espaces trops longs,
     * traduit les entités HTML dans une chaine de caractères,
     * enleve les espaces du début et de fin,
     */
    static function secureForm($data)
    {
        $data = strip_tags($data); // Supprime les balises HTML et PHP d'une chaine de caractère
        $data = htmlspecialchars($data); // Traduit les entités HTML dans une chaine de caractères
        $data = Trim($data); // Enleve les espaces du début et de fin  
        return $data;
    }
}
