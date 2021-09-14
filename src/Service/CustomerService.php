<?php declare(strict_types=1);

namespace Glambou\Service;

use Glambou\Model\Customer;

class CustomerService implements CustomerServiceInterface
{
    private DatabaseServiceInterface $databaseService;

    /**
     * @param DatabaseServiceInterface $databaseService
     */
    public function __construct(DatabaseServiceInterface $databaseService)
    {
        $this->databaseService = $databaseService;
    }

    /**
     * Example of a clean code
     *
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        $customer = $this->databaseService->findByID(1);

        return $customer[0];
    }
}