<?php
  /**
   * Sert à charger tous les controllers
   *
   * @param string $class => Nom du controller
   * @return none
   * Charge par require_once le bon script php
   */
  
    function app_autoloader($class) {
        $pathFind = false;
        for ($i = 1; $i <= 5 || !$pathFind; $i++) {
            if ($i <= 1) {
                $path = "";
            } else {
                $path = $path . "../";
            }
            // Controllers
            if (file_exists($path . "controllers/$class.php")) {
                require_once($path . "controllers/$class.php");
                $pathFind = true;
            }
        }
        if ($pathFind = false) {
            $lastError = error_get_last();
            trigger_error("Autoloader message => Class not found : $class - needed in " . $lastError["file"] . "(" . $lastError["line"] . ")", E_USER_ERROR);
        }
    }

    spl_autoload_register('app_autoloader');
