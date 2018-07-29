<?php
/**
 * @project BasePHP Framework
 * @file index.php created by Ariel Bogdziewicz on 29/07/2018
 * @author Ariel Bogdziewicz
 * @copyright Copyright © 2018 Ariel Bogdziewicz. All rights reserved.
 * @license MIT
 */
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
