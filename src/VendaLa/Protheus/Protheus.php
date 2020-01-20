<?php

namespace VendaLa\Protheus;

use BuzzinaSocial\Http\Client as HttpClient;
use VendaLa\Protheus\Auth\Auth;
use VendaLa\Protheus\Contracts\Authentication;
use VendaLa\Protheus\Resources\Products;

/**
 * Class Protheus.
 *
 * @package VendaLa\Protheus
 */
class Protheus extends HttpClient
{
    /**
     * Authentication that will be added to the header of request.
     *
     * @var Auth
     */
    private $basicAuth;

    /**
     * Endpoint of request.
     *
     * @var string
     */
    private $endpoint;

    /**
     * Create a new aurhentication with the endpoint.
     *
     * @param Authentication $basicAuth
     * @param string         $endpoint
     *
     * @throws \Exception
     */
    public function __construct(Authentication $basicAuth, string $endpoint)
    {
        $this->basicAuth = $basicAuth;
        $this->endpoint = $endpoint;

        $this->createNewSession();

        parent::__construct();
    }

    /**
     * @return Products
     */
    public function products(): Products
    {
        return new Products($this);
    }

    /**
     * @throws \Exception
     */
    private function createNewSession(): void
    {
        $this->setHeaders([
            'accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]);

        $this->setSettings('auth', [$this->basicAuth->getUsername(), $this->basicAuth->getPassword()]);

        $this->setSettings('timeout', 30);

        $this->setBaseURI($this->endpoint);
    }
}