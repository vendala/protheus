<?php

namespace VendaLa\Protheus\Resources;

use VendaLa\Protheus\Contracts\ResourceFacotry;
use VendaLa\Protheus\Helpers\Pagination;
use VendaLa\Protheus\Protheus;
use GuzzleHttp\Exception\RequestException;
use VendaLa\Protheus\Exceptions\ProductsException;

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
            throw new ProductsException($requestException->getMessage(), 500);
        }
    }

    /**
     * @return string
     */
    private function defineMessageException(): string
    {
        return  '';
    }

    /**
     * @return int
     */
    private function defineCodeExcption(): int
    {
        return 500;
    }
}