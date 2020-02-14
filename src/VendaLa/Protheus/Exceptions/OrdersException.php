<?php

namespace VendaLa\Protheus\Exceptions;

use Throwable;
use VendaLa\Protheus\Contracts\ProtheusExceptionContract;

/**
 * Class AuthenticationException
 *
 * @package VendaLa\Protheus\Exceptions
 */
class OrdersException extends ProtheusException implements ProtheusExceptionContract
{
    /**
     * @const int
     */
    public const CODE = 2000;

    /**
     * @const string
     */
    public const ORDER_DEFAULT = 'Erro ao buscar pedidos.';

    /**
     * @const string
     */
    public const ORDER_SEND = 'Erro ao enviar o pedido';

    /**
     * @const int
     */
    public const CODE_SEND = 2001;

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
    public function __construct($message = self::ORDER_DEFAULT, $code = self::CODE, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
