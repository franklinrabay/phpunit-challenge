<?php

namespace Glambou\Controller;

use Glambou\Model\Customer;
use Glambou\Service\CustomerServiceInterface;


class CustomerController extends Controller
{
    private CustomerServiceInterface $customerService;

    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * @throws \Exception
     *
     * @return Customer
     */
    public function getCustomerAction(array $parameterBag): Customer
    {
        // Too much if statements
        // Too much logic
        // Object creation - Dependency resolution

        $customerID = $this->getParam('id', $parameterBag);
        $resetName = $this->getParam('rule', $parameterBag);

        // 2 test cases
        // 1 - customerID > 1
        // 2 - customerID < 1
        if ($customerID < 1) {
            throw new \Exception('ID not valid');
        }

        //Mocked function call
        $customer = $this->customerService->getCustomer($customerID);

        if (!$customer) {
            throw new \Exception('I dont have customer');
        }

        // resetName
        // not reseting the name
        $this->customerService->resolveCustomerName($customer, $resetName);
        $this->customerService->appendEmail($customer, 'Make it happen');

        // assertEquals()
        return $customer;
    }

    //TODO: Based on header - get Empty Customer
    public function getAction()
    {
        // get the parameter from request
        // call the service
        // return the value
    }
}