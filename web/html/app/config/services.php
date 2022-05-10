<?php

use Phalcon\Mvc\Router;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Session\Factory;
use Myticket\Plugins\ExceptionPlugin;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Events\Event;
use Myticket\Plugins\SecurityPlugin;


/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () {
    $config = $this->getConfig();

    $view = new View();

    $oGestionEvenement = new EventsManager();
    $oLogger = $this->getLogger();
    $oGestionEvenement->attach(
        'view:beforeRender',
        function (Event $oEvent, $oView) use ($oLogger)
        {
            $oLogger->debug(
                $oView->getControllerName() .'/' . $oView->getActionName()
            );
        }
    );

    $view->setDI($this);
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines([
        '.volt' => function ($view) {
            $config = $this->getConfig();

            $volt = new VoltEngine($view, $this);

            $volt->setOptions([
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ]);

            return $volt;
        },
        '.phtml' => PhpEngine::class

    ]);

    $view->setEventsManager($oGestionEvenement);
    return $view;
});

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () {
    $config = $this->getConfig();

    $class = 'Phalcon\Db\Adapter\Pdo\\' . $config->database->adapter;
    $params = [
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
    ];

    if ($config->database->adapter == 'Postgresql') {
        unset($params['charset']);
    }

    $connection = new $class($params);

    return $connection;
});


/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $oOptions = [
        'uniqueId'      => 'myticket',
        'host'          => 'my-ticket-redis',
        'auth'          => 'Azerty',
        'port'          => 6379,
        'persistent'    => true,
        'lifetime'      => 3600,
        'prefix'        => 'app_session_',
        'adapter'       => 'redis',
    ];
    $oSession = Factory::load($oOptions);
    $oSession->start();
    return $oSession;
});

/**
 * Register router
 */
$di->setShared('router', function () {
    $router = new Router();
    $router->setUriSource(
        Router::URI_SOURCE_SERVER_REQUEST_URI
    );

    return $router;
});

$di->set('dispatcher', function () {

    $oGestionEvenement = new Phalcon\Events\Manager();


    $oGestionEvenement->attach('dispatch:beforeExecuteRoute', new SecurityPlugin());
    $oGestionEvenement->attach('dispatch:beforeException', new ExceptionPlugin());

    $oDispatcher = new Dispatcher();
    $oDispatcher->setEventsManager($oGestionEvenement);

    return $oDispatcher;
});

$di->setShared('logger', function(){
    $oLogger = new \Phalcon\Logger\Adapter\File(BASE_PATH . '/phalcon.log');
    
    return $oLogger;
});