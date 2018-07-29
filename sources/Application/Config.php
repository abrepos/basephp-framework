<?php
/**
 * @project BasePHP Framework
 * @file Config.php created by Ariel Bogdziewicz on 29/07/2018
 * @author Ariel Bogdziewicz
 * @copyright Copyright © 2018 Ariel Bogdziewicz. All rights reserved.
 * @license MIT
 */
namespace Project\Application;

use Base\Core\Ports;

/**
 * Class Config.
 * @package Project\Application
 */
class Config implements \Base\Core\Config
{
    /**
     * Session time in seconds.
     * @return int
     */
    function sessionTime(): int
    {
        return 2400;
    }

    /**
     * Configuration of ports for normal and secure connections.
     * @return Ports
     */
    function ports(): Ports
    {
        return new Ports(80, 443);
    }
}
