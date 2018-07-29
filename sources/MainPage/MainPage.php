<?php
namespace Project\MainPage;

use Base\Core\Controller;
use Base\Responses\Raw;
use Base\Responses\Redirect;

class MainPage extends Controller
{
    public function getOutput(): string
    {
        // TODO: Implement getOutput() method.
    }

    public function main()
    {
        return new Raw("MAIN");
    }

    public function second()
    {
        return new Raw("SECOND");
    }

    public function redirect()
    {
        return new Redirect("/second");
    }
}
