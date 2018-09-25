<?php
/**
 * @project BasePHP Core
 * @file Authorization.php created by Ariel Bogdziewicz on 29/07/2018
 * @author Ariel Bogdziewicz
 * @copyright Copyright © 2018 Ariel Bogdziewicz. All rights reserved.
 * @license MIT
 */
namespace Project\Application;

use Base\Core\Request;
use Base\Core\Session;
use Base\Core\Subpage;
use Base\Core\Visitor;
use Base\Exceptions\AuthorizationException;

/**
 * Class Authorization represents authorization service.
 * @package Base\Core
 */
class Authorization implements \Base\Core\Authorization
{
    const VISITOR_LOGGED_IN = "visitor_logged_in";

    /**
     * Throws exception when user is not authorized.
     * @param Request $request
     * @param Session $session
     * @param Subpage $subpage
     * @param Visitor $visitor
     * @param array $authorizationIds
     * @throws AuthorizationException
     */
    function authorize(Request $request, Session $session, Subpage $subpage, Visitor $visitor, array $authorizationIds): void
    {
        foreach ($authorizationIds as $authorizationId)
        {
            switch ($authorizationId)
            {
                case self::VISITOR_LOGGED_IN:
                    {
                        if (!$visitor->isLoggedIn())
                        {
                            throw new AuthorizationException("Visitor is not logged in.");
                        }
                        break;
                    }
                default:
                    {
                        break;
                    }
            }
        }
    }
}
