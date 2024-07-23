<?php

require("BaseController.php");

try {
    $module = isset($_GET["module"]) ? ucfirst($_GET["module"]) : "Index";
    $action = isset($_GET["action"]) ? $_GET["action"] : "index";

    if (is_callable($action)) {
        $action($module);
    } else {
        throw new Exception("Cette page n'est pas trouvable !");
    }
} catch (Exception $e) {
    render("Views/vError.php", ["message" => $e->getMessage()]);
}

