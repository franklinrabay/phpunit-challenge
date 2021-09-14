<?php

namespace Glambou\Controller;

use Glambou\Model\Customer;
use Glambou\Service\ConnectionService;
use Glambou\Service\CustomerService;
use Glambou\Service\DatabaseService;

class CustomerController extends Controller
{
    /**
     * @throws \Exception
     *
     * @return Customer
     */
    public function indexAction(): Customer
    {
        $customerID = $this->getParam('1');
        $resetName = $this->getParam('resetName');

        $customerService = new CustomerService(
            new DatabaseService(
                new ConnectionService('database domain')
            )
        );

        if ($customerID != 1) {
            throw new \Exception('ID not valid');
        }

        if ($this->getHeader('Header1') == 'OK') {
            $customer = $customerService->getCustomer();
        } elseif ($this->getHeader('Header2') == 'OK') {
            $customer = new Customer();
        } else {
            $customer = null;
        }

        if ($customer) {
            if ($resetName === 'resetName') {
                $customer->clearName();
            }

            $customer->appendEmail('Make it complex');

            if ($customer->name === '') {
                return $customer;
            }
        }

        return $customer;
    }
}