<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->pluginsDir,
        $config->application->formsDir,
    ]
)->register();

$loader->registerNamespaces(
    array(
        'Myticket\Plugins'  => $config->application->pluginsDir,
        'Myticket\Forms'    => $config->application->formsDir,
        'Myticket\Models'   => $config->application->modelsDir,
    )
);