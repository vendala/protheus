<?php

namespace VendaLa\Protheus\Exceptions;

use Exception;
use VendaLa\Protheus\Contracts\Authentication;

/**
 * Class AuthenticationException
 *
 * @package VendaLa\Protheus\Exceptions
 */
class AuthenticationException extends Exception implements Authentication
{

}