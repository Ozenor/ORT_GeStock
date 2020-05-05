<?php
// general controller
require_once('Controllers.php');
// model
require_once('model/PutModel.php');

class PutController extends Controllers
{

    /**
     * Public method for access api.
     * This method dynmically call the method based on the query string
     * @param string $ctrl => function name
     * @return call function if exist
     */
    public function processApi($ctrl)
    {
        $ctrl = trim($ctrl);
        if ((int) method_exists($this, $ctrl) > 0) {
            $this->$ctrl($ctrl);
            // If the method not exist with in this class
        } else {
            if ($ctrl == "") {
                $ctrl = "no controller";
            }
            $this->responseResult(array('status' => 'failed', 'result' => 'Controller not found -> ' . $ctrl));
        }
    }

    /**
     * Create a reader and insert in bdd
     *
     * @param string $ctrl => name controleur
     * @param array $param => param
     * @return json => text page
     * @by Matthy
     */
    private function putDisableProduct($ctrl)
    {
        global $post_vars;
        // Call to model
        $insert = putModel::putDisableProductModel();
        // Execute

        $param = $post_vars['datas'];
        if (!isset($param['id']) || empty($param['id'])) {
            $resultFinal = array('ctrl' => $ctrl, 'status' => 'failed', 'result' => "Problème avec les paramètres du PUT: ");
            $this->responseResult($resultFinal);
        }

        $this->tryCatchError($insert, $param, $ctrl);
        // If not database error, success
        $resultFinal = array('ctrl' => $ctrl, 'status' => 'success', 'result' => "Utilisateur créé");
        $this->responseResult($resultFinal);
    }

    /**
     * Create a reader and insert in bdd
     *
     * @param string $ctrl => name controleur
     * @param array $param => param
     * @return json => text page
     * @by Matthy
     */
    private function putDisableUser($ctrl)
    {
        global $post_vars;
        // Call to model
        $insert = putModel::putDisableUserModel();
        // Execute

        $param = $post_vars['datas'];
        if (!isset($param['id']) || empty($param['id'])) {
            $resultFinal = array('ctrl' => $ctrl, 'status' => 'failed', 'result' => "Problème avec les paramètres du PUT: ");
            $this->responseResult($resultFinal);
        }

        $this->tryCatchError($insert, $param, $ctrl);
        // If not database error, success
        $resultFinal = array('ctrl' => $ctrl, 'status' => 'success', 'result' => "Utilisateur créé");
        $this->responseResult($resultFinal);
    }
}

// Initiiate Library
if ($keySecure == "cle3") {
    $api = new PutController;
    $api->processApi(Controllers::secureForm($post_vars['ctrl']));
} else {
    header('Location: unauthorizedAccess');
    die();
}
