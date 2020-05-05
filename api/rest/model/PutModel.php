<?php

require_once('Models.php');

class PutModel extends Models
{

    /**
     * Desactive un produit
     *
     * @return object
     */
    public static function putDisableProductModel()
    {
        $dbConnect = putModel::bddConnect();
        $insert = $dbConnect->prepare("UPDATE produits SET actif=0 WHERE id=:id");
        return $insert;
    }

    /**
     * Desactive un produit
     *
     * @return object
     */
    public static function putDisableUserModel()
    {
        $dbConnect = putModel::bddConnect();
        $insert = $dbConnect->prepare("UPDATE utilisateurs SET actif=0 WHERE id=:id");
        return $insert;
    }
}
