<?php
// general controller
require_once('Controllers.php');
// model
require_once('model/PostModel.php');

class PostController extends Controllers
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
    private function postAddUser($ctrl)
    {
        // Call to model
        $insert = postModel::postAddUserModel();
        // Execute

        $param = $_REQUEST['datas'];
        if (!Controllers::checkPostParam($param)) {
            $resultFinal = array('ctrl' => $ctrl, 'status' => 'failed', 'result' => "Problème avec les paramètres du POST: ");
            $this->responseResult($resultFinal);
        }

        $this->tryCatchError($insert, $param, $ctrl);
        // If not database error, success
        $resultFinal = array('ctrl' => $ctrl, 'status' => 'success', 'result' => "Utilisateur créé");
        $this->responseResult($resultFinal);
    }
}

// Initiiate Library
if ($keySecure == "cles2") {
    $api = new PostController;
    $api->processApi(Controllers::secureForm(@$_REQUEST['ctrl']));
} else {
    header('Location: unauthorizedAccess');
    die();
}
