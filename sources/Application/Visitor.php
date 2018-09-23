<?php
/**
 * @project BasePHP Framework
 * @file Visitor.php created by Ariel Bogdziewicz on 24/09/2018
 * @author Ariel Bogdziewicz
 * @copyright Copyright © 2018 Ariel Bogdziewicz. All rights reserved.
 * @license MIT
 */
namespace Project\Application;

/**
 * Class Visitor.
 * @package Project\Application
 */
class Visitor implements \Base\Core\Visitor
{
    /**
     * Identifier of visitor. It may be ID of user from database.
     * @var int
     */
    protected $visitorId;

    /**
     * JSON Web Token.
     * @var string
     */
    protected $token;

    /**
     * Visitor constructor.
     * @param int $visitorId
     * @param string $token
     */
    public function __construct(int $visitorId = 0, string $token = "")
    {
        $this->visitorId = $visitorId;
        $this->token = $token;
    }

    /**
     * Returns true if visitor is authenticated. In other words we know who is logged in.
     * @return bool
     */
    function isLoggedIn(): bool
    {
        return false;
    }

    /**
     * Returns false if visitor is not authorized for at least one authorization identifier.
     * @param array $authorizationIds
     * @return bool
     */
    function isAuthorized(array $authorizationIds): bool
    {
        return count($authorizationIds) == 0;
    }
}
