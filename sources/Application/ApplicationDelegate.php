<?php
/**
 * @project BasePHP Framework
 * @file ApplicationDelegate.php created by Ariel Bogdziewicz on 29/07/2018
 * @author Ariel Bogdziewicz
 * @copyright Copyright © 2018 Ariel Bogdziewicz. All rights reserved.
 * @license MIT
 */
namespace Project\Application;

use Base\Core\Ports;
use Base\Core\Router;
use Base\Core\Request;
use Base\Exceptions\Exception;
use Base\Responses\Response;
use Base\Responses\Raw;

/**
 * Class ApplicationDelegate.
 * @package Project\Application
 */
class ApplicationDelegate implements \Base\Core\ApplicationDelegate
{
    /**
     * ApplicationDelegate constructor.
     * Constructor creates all resources owned by application delegate
     * like database connection.
     */
    public function __construct()
    {
    }

    /**
     * Activates all common resources owned by application delegate
     * for example may open database connection which will be common for all controllers.
     */
    public function open(): void
    {
        // TODO: Implement open() method.
    }

    /**
     * Returns configuration of ports for normal and secure connections.
     * @return Ports
     */
    function ports(): Ports
    {
        return new Ports(80, 443);
    }

    /**
     * Registers all routes for project.
     * @param Router $router
     *      Router object which has to be used to register routes.
     */
    public function registerRoutes(Router $router): void
    {
        $router->get("/", "\\Project\\MainPage\\MainPage::main");
        $router->get("/second", "\\Project\\MainPage\\MainPage::second");
        $router->get("/redirect", "\\Project\\MainPage\\MainPage::redirect");
    }
    
    /**
     * Returns current request path. It depends on custom
     * project settings or custom rewrite rules for incoming URL.
     * @param Request $request
     *      Request object which can be used to get current request path.
     * @return string
     *      Current request path.
     */
    public function currentRequestPath(Request $request): string
    {
        return $request->path();
    }

    /**
     * Returns response to display in case of exception defined by BasePHP which
     * delivers additional data about error like recommended HTTP code which should
     * be returned in response. It is good place to return custom 404 page
     * if exception is related to wrong URL or missing content.
     * @param Request $request
     * @param Exception $exception
     * @return Response
     */
    public function responseForException(Request $request, Exception $exception): Response
    {
        return new Raw($exception, "text/plain", $exception->httpCode());
    }

    /**
     * Returns response to display in case of unknown exceptions.
     * @param Request $request
     * @param \Throwable $throwable
     * @return Response
     */
    public function responseForThrowable(Request $request, \Throwable $throwable): Response
    {
        return new Raw($throwable, "text/plain", 500);
    }

    /**
     * Closes all common resources owned by application delegate
     * like database connection.
     */
    public function close(): void
    {
        // TODO: Implement close() method.
    }
}
