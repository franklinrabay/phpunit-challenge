<?php declare(strict_types=1);

namespace Glambou\Service;

use Glambou\Model\Customer;

interface CustomerServiceInterface
{
    /**
     * @return Customer
     */
    public function getCustomer(int $customerID): ?Customer;

    /**
     * @param Customer $customer
     *
     * @param string $rule
     */
    public function resolveCustomerName(Customer $customer, ?string $rule): void;

    /**
     * @param Customer $customer
     *
     * @param string $test
     */
    public function appendEmail(Customer $customer, string $text): void;
}