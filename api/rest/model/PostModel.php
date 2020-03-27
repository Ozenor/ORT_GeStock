<?php

require_once('Models.php');

class PostModel extends Models
{

    /**
     * Model for postCreateReader Controler
     *
     * @return object
     */
    public static function postAddUserModel()
    {
        $dbConnect = postModel::bddConnect();
        $insert = $dbConnect->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, type, actif)
                                  VALUES (:addNom, :addPrenom, :addEmail, :addMdp, :addType, :addActif)");
        return $insert;
    }
}
