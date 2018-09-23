<?php
/**
 * @project BasePHP Framework
 * @file ApplicationDelegate.php created by Ariel Bogdziewicz on 29/07/2018
 * @author Ariel Bogdziewicz
 * @copyright Copyright © 2018 Ariel Bogdziewicz. All rights reserved.
 * @license MIT
 */
namespace Project\Application;

use Base\Core\Request;
use Base\Core\Response;
use Base\Data\Raw;
use Base\Exceptions\Exception;

/**
 * Class ApplicationDelegate must not throw exceptions
 * in its constructor. All initialization which throws exceptions
 * should be implemented in open() method.
 * @package Project\Application
 */
class ApplicationDelegate implements \Base\Core\ApplicationDelegate
{
    /**
     * ApplicationDelegate constructor.
     * Constructor creates all resources owned by application delegate
     * like database connection. It must not throw exceptions. All initialization
     * which throws exceptions should be implemented in open() method.
     */
    public function __construct()
    {
    }

    /**
     * Activates all common resources owned by application delegate
     * for example may open database connection which will be common for all controllers.
     * @param Request $request
     */
    public function open(Request $request): void
    {
        // TODO: Implement open() method.
    }

    /**
     * Returns domain for current session.
     *
     * If wildcard domain is returned with dot at the beginning like ".example.com"
     * then session will be available in all subdomains.
     *
     * If specific domain is returned without dot at the beginning like "example.com",
     * "subdomain.example.com" or null then session will be available only for current hostname.
     *
     * @param Request $request
     * @return string
     */
    function sessionDomain(Request $request): ?string
    {
        return null;
    }

    /**
     * Creates instance of main router. Router is not added to application
     * as dependency because it has to be created where exception handling is available.
     * @return \Base\Core\Router
     * @throws \Base\Exceptions\ArgumentException
     */
    function createRouter(): \Base\Core\Router
    {
        return new Router();
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
     * Creates instance of visitor.
     * @return \Base\Core\Visitor
     */
    function createVisitor(): \Base\Core\Visitor
    {
        return new Visitor(0);
    }

    /**
     * Returns response to display in case of exception defined by BasePHP which
     * delivers additional data about error like recommended HTTP code which should
     * be returned in response. It is good place to return custom 404 page
     * if exception is related to wrong URL or missing content.
     * @param Request|null $request
     * @param Exception $exception
     * @return Response
     */
    public function responseForException(?Request $request, Exception $exception): Response
    {
        return new Response(new Raw($exception), $exception->httpCode());
    }

    /**
     * Returns response to display in case of unknown exceptions.
     * @param Request|null $request
     * @param \Throwable $throwable
     * @return Response
     */
    public function responseForThrowable(?Request $request, \Throwable $throwable): Response
    {
        return new Response(new Raw($throwable), 500);
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
