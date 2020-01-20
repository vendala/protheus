<?php

namespace VendaLa\Protheus\Contracts;

/**
 * Interface Pagination.
 *
 * @package VendaLa\Protheus\Contracts
 */
interface Pagination
{
    /**
     * Set page.
     *
     * @param int $page
     *
     * @return ResourceFacotry
     */
    public function setPage($page): ResourceFacotry;

    /**
     * Get page.
     *
     * @return int
     */
    public function getPage();

    /**
     * @return int
     */
    public function getPerPage();

    /**
     * @param int $perPage
     *
     * @return ResourceFacotry
     */
    public function setPerPage($perPage): ResourceFacotry;
}
