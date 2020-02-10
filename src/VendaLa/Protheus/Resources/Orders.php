<?php

namespace VendaLa\Protheus\Resources;

use VendaLa\Protheus\Contracts\ResourceFacotry;
use VendaLa\Protheus\Helpers\Pagination;
use VendaLa\Protheus\Protheus;

use GuzzleHttp\Exception\RequestException;

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
     * Products constructor.
     *
     * @param Protheus $protheus
     */
    public function __construct(Protheus $protheus)
    {
        $this->protheus = $protheus;
    }

    /**
     * @return \GuzzleHttp\Psr7\Response|mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws OrdersException
     */
    public function get()
    {
        try {
            $response = $this->protheus->post(self::GET_PATH, $this->body);
            $response->getBody()->rewind();
            return $response;
        } catch (RequestException $requestException) {
            ## TODO: Add log
        } finally {
            
        }
    }
}
