<?php
/**
 * @project BasePHP Framework
 * @file Config.php created by Ariel Bogdziewicz on 29/07/2018
 * @author Ariel Bogdziewicz
 * @copyright Copyright © 2018 Ariel Bogdziewicz. All rights reserved.
 * @license MIT
 */
namespace Project\Application;

/**
 * Router of the application.
 * @package Project\Application
 */
class Router extends \Base\Core\Router
{
    /**
     * Router constructor.
     * @throws \Base\Exceptions\ArgumentException
     */
    public function __construct()
    {
        parent::__construct();
        $this->get("/", "\\Project\\MainPage\\MainPage::main");
        $this->get("/second", "\\Project\\MainPage\\MainPage::second");
        $this->get("/redirect", "\\Project\\MainPage\\MainPage::redirectToSecond");
        $this->get("/one/{param1}/{param2}", "\\Project\\MainPage\\MainPage::one<two");
        $this->get("/phpinfo", "\\Project\\MainPage\\MainPage::getPhpInfo");
    }
}
