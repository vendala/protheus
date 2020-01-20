<?php

namespace VendaLa\Protheus\Helpers;

use VendaLa\Protheus\Contracts\Pagination as PaginationFactory;
use VendaLa\Protheus\Contracts\ResourceFacotry;

/**
 * Class Pagination
 *
 * @package VendaLa\Protheus\Helpers
 */
class Pagination implements PaginationFactory, ResourceFacotry
{
    /**
     * @const int
     */
    private const DEFAULT_PAGE = 1;

    /**
     * @const int
     */
    private const DEFAULT_PER_PAGE = 10;

    /**
     * @const string
     */
    private const KEY_PAGE = 'page';

    /**
     * @const string
     */
    private const KEY_PER_PAGE = 'qty';

    /**
     * @var int
     */
    private $page = 1;

    /**
     * @var int
     */
    private $perPage = 1;

    /**
     * @return array
     */
    public function paginationToArray(): array
    {
        return [
            self::KEY_PAGE => $this->page,
            self::KEY_PER_PAGE => $this->perPage
        ];
    }

    /**
     * Get page.
     *
     * @return mixed
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * Set page.
     *
     * @param int $page
     *
     * @return Pagination
     */
    public function setPage($page): ResourceFacotry
    {
        $this->page = $page;

        return $this;
    }

    /**
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     *
     * @return Pagination
     */
    public function setPerPage($perPage): ResourceFacotry
    {
        $this->perPage = $perPage;

        return $this;
    }

    protected function resetPagination()
    {
        $this->page = self::DEFAULT_PAGE;
        $this->perPage = self::DEFAULT_PER_PAGE;
    }
}
