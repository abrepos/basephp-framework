<?php
/**
 * @project BasePHP Framework
 * @file MainPage.php created by Ariel Bogdziewicz on 29/07/2018
 * @author Ariel Bogdziewicz
 * @copyright Copyright © 2018 Ariel Bogdziewicz. All rights reserved.
 * @license MIT
 */
namespace Project\MainPage;

use Base\Core\Call;
use Base\Core\Controller;
use Base\Core\Response;
use Project\Application\Authorization;

/**
 * Class MainPage is example controller.
 * @package Project\MainPage
 */
class MainPage extends Controller
{
    /**
     * Test of empty route.
     * @return Response
     */
    public function main(): Response
    {
        return $this->raw("MAIN");
    }

    /**
     * Test of simple route.
     * @return Response
     * @throws \Base\Exceptions\AuthorizationException
     */
    public function second(): Response
    {
        $this->authorize(Authorization::VISITOR_LOGGED_IN);
        return $this->raw("SECOND");
    }

    /**
     * Test of redirect.
     * @return Response
     */
    public function redirectToSecond(): Response
    {
        return $this->redirect("/second");
    }

    /**
     * Test of parent method.
     * @param Call $callback
     * @return Response
     */
    public function one(Call $callback): Response
    {
        $child = $callback->call()->content();
        return $this->raw("ONE({$child})");
    }

    /**
     * Test of child method.
     * @param $param1
     * @param $param2
     * @return Response
     */
    public function two($param1, $param2): Response
    {
        return $this->raw("TWO({$param1}, {$param2})");
    }
}
