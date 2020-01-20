<?php

namespace VendaLa\Protheus\Auth;

use VendaLa\Protheus\Contracts\Authentication;

/**
 * Class Auth
 */
class Auth implements Authentication
{
    /**
     * @cosnt string
     */
    private const PREFIX = 'Basic ';

    /**
     * Token.
     *
     * @var string
     */
    private $username;

    /**
     * Access key.
     *
     * @var string
     */
    private $password;

    /**
     * Auth constructor.
     *
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Sets the authentication header.
     */
    public function getAuthorization(): string
    {
        return self::PREFIX . base64_encode($this->username . ':' . $this->password);
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return Auth
     */
    public function setUsername(string $username): Auth
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return Auth
     */
    public function setPassword(string $password): Auth
    {
        $this->password = $password;

        return $this;
    }
}
