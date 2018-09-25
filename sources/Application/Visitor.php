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
     * @var string|int
     */
    protected $visitorId;

    /**
     * JSON Web Token.
     * @var string
     */
    protected $token;

    /**
     * Visitor constructor.
     * @param string|int $visitorId
     * @param string $token
     */
    public function __construct($visitorId = 0, $token = "")
    {
        $this->visitorId = $visitorId;
        $this->token = $token;
    }

    /**
     * Returns true if visitor is authenticated. In other words we know who is logged in.
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return false;
    }

    /**
     * Returns visitor identifier.
     * @return int|string
     */
    public function id()
    {
        return $this->visitorId;
    }

    /**
     * Returns token.
     * @return string
     */
    public function token(): string
    {
        return $this->token;
    }
}
