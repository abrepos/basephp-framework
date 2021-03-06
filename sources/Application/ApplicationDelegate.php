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
use Base\Core\Session;
use Base\Data\Raw;
use Base\Exceptions\Exception;
use Base\Tools\Resolver;

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
     * @param \Base\Core\Config $config
     * @param Request $request
     * @param Resolver $resolver
     */
    public function open(\Base\Core\Config $config, Request $request, Resolver $resolver): void
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
     * Creates subpage which represents part of website or API indicated by subdomain
     * or external domain with separated set of authorization settings for visitor.
     * @param Request $request
     * @param Session $session
     * @return Subpage
     */
    function createSubpage(Request $request, Session $session): \Base\Core\Subpage
    {
        return new Subpage();
    }

    /**
     * Creates instance of visitor.
     * @param Request $request
     * @param Session $session
     * @param \Base\Core\Subpage $subpage
     * @return Visitor
     */
    function createVisitor(Request $request, Session $session, \Base\Core\Subpage $subpage): \Base\Core\Visitor
    {
        // TODO: Add here dependency on sub-page and hash for remember me.
        // TODO: 1. Log in using session if available.
        // TODO: 2. Log in using cookie if available (option "Remember me" for session).
        // TODO: 3. Log in using token if available.
        // TODO: 4. Log in using token when expired (option "Remember me" for token).
        return new Visitor(0);
    }

    /**
     * Creates authorization service. Implementation depends on client.
     * @return Authorization
     */
    function createAuthorizationService(): \Base\Core\Authorization
    {
        return new Authorization();
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
