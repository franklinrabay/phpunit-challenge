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
    public function getCustomer(int $customerID): ?Customer
    {
        $customer = $this->databaseService->findByID($customerID);

        return $customer[0] ?? null;
    }

    /**
     * @param Customer $customer
     *
     * @param string $rule
     */
    public function resolveCustomerName(Customer $customer, ?string $rule): void
    {
        if ($rule && $rule == 'resetName') {
            $customer->setName('');
        }
    }

    /**
     * @param Customer $customer
     *
     * @param string $test
     */
    public function appendEmail(Customer $customer, string $text): void
    {
        $customer->setEmail($customer->getEmail().' '.$text);
    }
}