<?php

namespace VendaLa\Protheus\Exceptions;

use Throwable;
use \Exception;
use \VendaLa\Protheus\Contracts\ProtheusExceptionContract;

/**
 * Class AuthenticationException
 *
 * @package VendaLa\Protheus\Exceptions
 */
class OrdersException extends Exception implements ProtheusExceptionContract
{
    /**
     * @const string
     */
    public const ORDER_DEFAULT = 'Erro ao buscar os pedidos.';

    /**
     * @const string
     */
    public const ORDER_SEND = 'Erro ao enviar o pedido';

    /**
     * @const string
     */
    public const ORDER_GET = 'Erro ao buscar o pedido';

    /**
     * @const int
     */
    public const CODE_DEFAULT = 2000;

    /**
     * @const int
     */
    public const CODE_SEND = 2001;

    /**
     * @const int
     */
    public const CODE_GET = 2002;

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
    public function __construct($message = self::ORDER_DEFAULT, $code = self::CODE_DEFAULT, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
