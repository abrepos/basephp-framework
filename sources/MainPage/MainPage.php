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
use Base\Responses\Raw;
use Base\Responses\Redirect;

/**
 * Class MainPage is example controller.
 * @package Project\MainPage
 */
class MainPage extends Controller
{
    /**
     * Test of empty route.
     * @return Raw
     */
    public function main()
    {
        return $this->raw("MAIN");
    }

    /**
     * Test of simple route.
     * @return Raw
     */
    public function second()
    {
        return $this->raw("SECOND");
    }

    /**
     * Test of redirect.
     * @return Redirect
     */
    public function redirectToSecond()
    {
        return $this->redirect("/second");
    }

    /**
     * Test of parent method.
     * @param Call $callback
     * @return Raw
     */
    public function one(Call $callback)
    {
        $child = $callback->call()->body();
        return $this->raw("ONE({$child})");
    }

    /**
     * Test of child method.
     * @param $param1
     * @param $param2
     * @return Raw
     */
    public function two($param1, $param2)
    {
        return $this->raw("TWO({$param1}, {$param2})");
    }
}
