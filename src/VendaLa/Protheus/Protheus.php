<?php

namespace VendaLa\Protheus;

use BuzzinaSocial\Http\Client as HttpClient;
use VendaLa\Protheus\Auth\Auth;
use VendaLa\Protheus\Contracts\Authentication;

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
     * @throws \Exception
     */
    private function createNewSession(): void
    {
        $this->setHeaders([
            'accept' => 'application/json',
            'Content-Type' => 'application/json',
            'auth' => [$this->basicAuth->getUsername(), $this->basicAuth->getPassword()]
        ]);

        $this->setBaseURI($this->endpoint);
    }
}