<?php declare(strict_types=1);

namespace Glambou\Service;

use Glambou\Model\Customer;

interface CustomerServiceInterface
{
    /**
     * @return Customer
     */
    public function getCustomer(): Customer;
}