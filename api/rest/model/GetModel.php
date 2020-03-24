<?php

require_once('Models.php');

class GetModel extends Models
{

    /**
     * Model for getFirstPageBook Controler
     *
     * @return object
     */
    public static function getUsersModel()
    {
        $dbConnect = Models::bddConnect();
        $query = $dbConnect->prepare(
            "SELECT * "
                . "FROM utilisateurs"
                . " WHERE ("
                . "actif=1) "
                . "ORDER BY id ASC "
        );
        // print_r($query);
        return $query;
    }
}
