<?php declare(strict_types=1);

namespace Glambou\Service;

interface ConnectionServiceInterface
{
    /**
     * @return string
     */
    public function connect(): string;

    /**
     * @return array
     */
    public function findAllCustomers(): array;

    /**
     * @return array
     */
    public function findCustomer(): array;
}