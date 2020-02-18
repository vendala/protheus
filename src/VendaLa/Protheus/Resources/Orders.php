<?php

namespace VendaLa\Protheus\Resources;

use Exception;
use VendaLa\Protheus\Exceptions\OrdersException;
use VendaLa\Protheus\Contracts\ResourceFacotry;
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
     * @const string
     */
    private const GET_PATH = 'rest/NO2W003';

    /**
     * @var array
     */
    private $body;

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
        $this->structureBody();
    }

    /**
     * @return array
     */
    private function structureBody(): array
    {
        $body = $this->paginationToArray();
        $body['initial_date'] = date('Y-m-d');
        $body['final_date'] = date('Y-m-d');
        return $this->body = $body;
    }

    /**
     * Mensagem de Exception.
     *
     * @param string $status
     * @return string
     */
    private function defineMessageException(string $status): string
    {
        return $status;
    }

    /**
     * Status code.
     *
     * @param int $status
     * @return integer
     */
    private function defineCodeExcption(int $status): int
    {
        return $status;
    }

    /**
     * Envia um pedido para a Totvs.
     *
     * @param object $order
     * @return mixed
     */
    public function post(object $order)
    {
        try {
            $response = $this->protheus->post(self::POST_PATH, $order);
            $response->getBody()->rewind();
            return $response;
        } catch (Exception $e) {
            throw new OrdersException($this->defineMessageException(OrdersException::ORDER_SEND), $this->defineCodeExcption(OrdersException::CODE_SEND), $e);
        }
    }

    /**
     * Busca um pedido com todas as informações.
     *
     * @param array $body
     * @return mixed
     */
    public function get(array $body)
    {
        try {
            $this->body = (object) array_merge((array) $this->body, (array) $body);
            $response = $this->protheus->post(self::GET_PATH, $this->body);
            $response->getBody()->rewind();
            return $response;
        } catch (Exception $e) {
            throw new OrdersException($this->defineMessageException(OrdersException::ORDER_GET), $this->defineCodeExcption(OrdersException::CODE_GET), $e);
        }
    }
}
