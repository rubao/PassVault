<?php

require_once dirname(__FILE__)."/lib/Twig/Autoloader.php";
require_once dirname(__FILE__)."/lib/PassVault/Component/Registry/Registry.php";

$registry = PassVault_Component_Registry_Registry::getInstance();

if (is_null($registry->get("twig"))) {
    $loader = new Twig_Loader_Filesystem("templates");
    $twig = new Twig_Environment(
                $loader, 
                array(
                    'cache' => 'compilation_cache',
                    'auto_reload' => true
                )
            );
}

$registry->register("twig", $twig);
