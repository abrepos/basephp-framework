<?php
/**
 * @project BasePHP Framework
 * @file MainPage.php created by Ariel Bogdziewicz on 29/07/2018
 * @author Ariel Bogdziewicz
 * @copyright Copyright © 2018 Ariel Bogdziewicz. All rights reserved.
 * @license MIT
 */
namespace Project\MainPage;

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
}
