<?php
// general controller
require_once('Controllers.php');
// model
require_once('model/GetModel.php');

class GetController extends Controllers
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
     * Renvoi la liste de tous les utilisateurs
     *
     * @param string $ctrl => name controleur
     * @return json => text page
     */
    private function getUsers($ctrl)
    {
        // Call to model
        $query = GetModel::getUsersModel();
        // Execute query
        $param = array();
        $this->tryCatchError($query, $param, $ctrl);
        // Result
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // No result
        if ($result == false) {
            $resultFinal = array('controller' => $ctrl, 'status' => 'failed', 'result' => 'No data found');
            // Success
        } else {
            $resultFinal = array('controller' => $ctrl, 'status' => 'success', 'result' => $result);
        }
        $this->responseResult($resultFinal);
    }
    /**
     * Renvoi la liste de tous les produits
     *
     * @param string $ctrl => name controleur
     * @return json => text page
     */
    private function getProducts($ctrl)
    {
        // Call to model
        $query = GetModel::getProductsModel();
        // Execute query
        $param = array();
        $this->tryCatchError($query, $param, $ctrl);
        // Result
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // No result
        if ($result == false) {
            $resultFinal = array('controller' => $ctrl, 'status' => 'failed', 'result' => 'No data found');
            // Success
        } else {
            $resultFinal = array('controller' => $ctrl, 'status' => 'success', 'result' => $result);
        }
        $this->responseResult($resultFinal);
    }
}

// Initiiate Library
if ($keySecure == "cle1") {
    $api = new GetController;
    $api->processApi(Controllers::secureForm(@$_REQUEST['ctrl']));
} else {
    header('Location: unauthorizedAccess');
    die();
}
