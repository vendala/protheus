<?php

namespace VendaLa\Protheus\Exceptions;

use Throwable;
use VendaLa\Protheus\Contracts\ProtheusExceptionContract;

/**
 * Class AuthenticationException
 *
 * @package VendaLa\Protheus\Exceptions
 */
class ProductsException extends ProtheusException implements ProtheusExceptionContract
{
    /**
     * @const int
     */
    public const CODE = 1000;

    /**
     * @const string
     */
    public const MESSAGE_DEFAULT = 'Erro ao buscar produtos.';

    /**
     * @const string
     */
    public const MESSAGE_FIND_ALL = 'Erro ao buscar paginação de produto';

    /**
     * @const int
     */
    public const CODE_FIND_ALL = 1001;

    /**
     * @const strings'
     */
    public const MESSAGE_FIND_BY_SKU = 'Erro ao buscar SKU específico.';

    /**
     * @const int
     */
    public const CODE_FIND_BY_SKU = 1002;

    /**
     * @const strings'
     */
    public const MESSAGE_DELETE_ON_QUEUE = 'Erro ao remover produtos da fila.';

    /**
     * @const int
     */
    public const CODE_DELETE_ON_QUEUE = 1003;

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
    public function __construct($message = self::MESSAGE_DEFAULT, $code = self::CODE, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
