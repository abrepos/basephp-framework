<?php
namespace Project;

require_once ("vendor/autoload.php");

use Base\Core\Application;
use Project\Application\ApplicationDelegate;
use Project\Application\Config;

// Create application delegate.
$applicationDelegate = new ApplicationDelegate();

// Create configuration.
$config = new Config();

// Create application and run.
$application = new Application($applicationDelegate, $config);
$application->run();
unset($application);
