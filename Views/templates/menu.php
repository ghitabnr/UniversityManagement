<?php

// Load menu items from a configuration file
$menu = require("Configuration/Modules.php");
?>

<!-- Menu list -->
<ul>
    <!-- Static menu item for home -->
    <li><a href="index.php?module=Index&action=index">Accueil</a></li>
    
    <?php
    // Dynamically generate menu items based on the $menu array
    foreach ($menu as $moduleKey => $moduleName) {
        // Ensure the output is safe to display
        $safeModuleKey = htmlspecialchars($moduleKey);
        $safeModuleName = htmlspecialchars($moduleName);
        
        echo "<li><a href='index.php?module={$safeModuleKey}&action=liste'>{$safeModuleName}</a></li>";
    }
    ?>
    
    <!-- Static menu item for logout -->
</ul>
