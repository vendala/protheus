<?php

namespace VendaLa\Protheus\Resources;

use GuzzleHttp\Exception\RequestException;
use VendaLa\Protheus\Contracts\ResourceFacotry;
use VendaLa\Protheus\Exceptions\ProductsException;
use VendaLa\Protheus\Helpers\Pagination;
use VendaLa\Protheus\Protheus;

/**
 * Class Products
 *
 * @package VendaLa\Protheus\Resources
 */
class Products extends Pagination implements ResourceFacotry
{
    /**
     * @const string
     */
    private const DEFAULT_SKU = '*';

    /**
     * @const string
     */
    private const PATH = 'rest/NO2W001A';

    /**
     * @var string
     */
    private $sku = self::DEFAULT_SKU;

    /**
     * @var array
     */
    private $body;

    /**
     * @var Protheus
     */
    private $protheus;

    /**
     * Define whether to list the displayed products.
     *
     * @var bool
     */
    private $queueUpdated = false;

    /**
     * Products constructor.
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
        $body['products'] = $this->sku;
        $body['updated'] = false;

        return $this->body = $body;
    }

    /**
     * @return \GuzzleHttp\Psr7\Response|mixed|\Psr\Http\Message\ResponseInterface
     *
     * @throws ProductsException
     */
    public function get()
    {
        try {
            $this->structureBody();
            return $this->protheus->post(self::PATH, $this->body);
        } catch (RequestException $requestException) {
            ## TODO: Add log

            throw new ProductsException($this->defineMessageException(), $this->defineCodeExcption());
        } finally {
            $this->reset();
        }
    }

    /**
     * @return string
     */
    private function defineMessageException(): string
    {
        return $this->sku === self::DEFAULT_SKU ? ProductsException::MESSAGE_FIND_ALL : ProductsException::MESSAGE_FIND_BY_SKU;
    }

    /**
     * @return int
     */
    private function defineCodeExcption(): int
    {
        return $this->defineMessageException() === ProductsException::MESSAGE_FIND_ALL ? ProductsException::CODE_FIND_ALL : ProductsException::CODE_FIND_BY_SKU;
    }

    /**
     * @return void
     */
    private function reset()
    {
        $this->disableQueueUpdated();
        $this->setDefaultSku();
    }

    /**
     * @return $this
     */
    public function disableQueueUpdated()
    {
        $this->queueUpdated = false;

        return $this;
    }

    /**
     * @return $this
     */
    private function setDefaultSku()
    {
        $this->sku = self::DEFAULT_SKU;

        return $this;
    }

    /**
     * @param string $sku
     *
     * @return Products
     */
    public function setSku($sku): Products
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * @return $this
     */
    public function enableQueueUpdated()
    {
        $this->queueUpdated = true;

        return $this;
    }
}
