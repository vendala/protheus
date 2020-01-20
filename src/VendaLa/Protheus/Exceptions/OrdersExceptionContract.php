<?php

namespace VendaLa\Protheus\Exceptions;

use Throwable;
use VendaLa\Protheus\Contracts\Authentication;
use VendaLa\Protheus\Contracts\ProtheusExceptionContract;

/**
 * Class AuthenticationException
 *
 * @package VendaLa\Protheus\Exceptions
 */
class OrdersExceptionContract extends ProtheusException implements ProtheusExceptionContract
{
    /**
     * Construct the exception. Note: The message is NOT binary safe.
     *
     * @link  https://php.net/manual/en/exception.construct.php
     *
     * @param string    $message  [optional] The Exception message to throw.
     * @param int       $code     [optional] The Exception code.
     * @param Throwable $previous [optional] The previous throwable used for the exception chaining.
     *
     * @since 5.1.0
     */
    public function __construct($message = "", $code = 3000, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
