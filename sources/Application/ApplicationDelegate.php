<?php
namespace Project\Application;

use Base\Core\Router;
use Base\Core\Request;
use Base\Exceptions\Exception;
use Base\Responses\Response;
use Base\Responses\Raw;

class ApplicationDelegate implements \Base\Core\ApplicationDelegate
{
    /**
     * Registers all routes for project.
     * @param Router $router
     *      Router object which has to be used to register routes.
     */
    function registerRoutes(Router $router): void
    {
        $router->get("/", "\\Project\\MainPage\\MainPage::main");
        $router->get("/second", "\\Project\\MainPage\\MainPage::second");
        $router->get("/redirect", "\\Project\\MainPage\\MainPage::redirect");
    }
    
    /**
     * Returns current request path. It depends on custom
     * project settings or custom rewrite rules for incoming URL.
     * This path will be processed by router.
     * @param Request $request
     *      Request object which can be used to get current request path.
     * @return string
     *      Current request path.
     */
    function currentRequestPath(Request $request): string
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
    function responseForException(Request $request, Exception $exception): Response
    {
        return new Raw($exception, "text/plain", $exception->httpCode());
    }

    /**
     * Returns response to display in case of unknown exceptions.
     * @param Request $request
     * @param \Throwable $throwable
     * @return Response
     */
    function responseForThrowable(Request $request, \Throwable $throwable): Response
    {
        return new Raw($throwable, "text/plain", 500);
    }
}
