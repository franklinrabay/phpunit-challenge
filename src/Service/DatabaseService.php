<?php declare(strict_types=1);

namespace Glambou\Service;

class DatabaseService implements DatabaseServiceInterface
{
    private ConnectionService $connectionService;

    /**
     * @param ConnectionService $connectionService
     */
    public function __construct(ConnectionService $connectionService)
    {
        $this->connectionService = $connectionService;
    }

    /**
     * @return array
     */
    public function fetch(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function find(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return $this->connectionService->findAllCustomers();
    }

    /**
     * @param int $id
     *
     * @return array
     */
    public function findByID(int $id): array
    {
        return $this->connectionService->findCustomer();
    }
}