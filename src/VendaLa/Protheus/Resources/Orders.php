<?php

namespace VendaLa\Protheus\Resources;

use VendaLa\Protheus\Exceptions\OrdersException;
use VendaLa\Protheus\Contracts\ResourceFacotry;
use GuzzleHttp\Exception\RequestException;
use VendaLa\Protheus\Helpers\Pagination;
use VendaLa\Protheus\Protheus;

/**
 * Class Orders.
 *
 * @package VendaLa\Protheus\Resources
 */
class Orders extends Pagination implements ResourceFacotry
{

    /**
     * @const string
     */
    private const POST_PATH = 'rest/NO2W002';

    /**
     * @var Protheus
     */
    private $protheus;

    /**
     * Orders constructor.
     *
     * @param Protheus $protheus
     */
    public function __construct(Protheus $protheus)
    {
        $this->protheus = $protheus;
    }

    public function post($order)
    {
        try {
            $response = $this->protheus->post(self::POST_PATH, $order);
            $response->getBody()->rewind();
            return $response;
        } catch (RequestException $requestException) {
            throw new OrdersException($this->defineMessageException(), $this->defineCodeExcption());
        }
    }

    /**
     * @return string
     */
    private function defineMessageException(): string
    {
        return OrdersException::ORDER_SEND;
    }

    /**
     * @return int
     */
    private function defineCodeExcption(): int
    {
        return  OrdersException::CODE_SEND;
    }
}
