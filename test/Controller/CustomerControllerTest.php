<?php

namespace Glambou\Test\Controller;

use Glambou\Controller\CustomerController;
use Glambou\Model\Customer;
use Glambou\Service\ConnectionService;
use Glambou\Service\CustomerService;
use Glambou\Service\CustomerServiceInterface;
use Glambou\Service\DatabaseService;

// MOCKING - DEPENDENCY INJECTION
// DATAPROVIDERS - USE CASES
// HANDLE EXCEPTIONS - DIFFERENT TEST CASE


class CustomerControllerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var CustomerServiceInterface
     */
    private CustomerServiceInterface $customerService;

    /**
     * @var CustomerController
     */
    private CustomerController $customerController;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->customerService = $this->createPartialMock(
            CustomerService::class,
            [
                'getCustomer',
            ]
        );
        $this->customerController = new CustomerController($this->customerService);
    }

    /**
     * @dataProvider getCustomerActionData
     *
     * @param array $parameterBag
     */
    public function testGetCustomerAction(
        array $parameterBag,
        Customer $getCustomerWillReturn,
        Customer $expect
    ): void {

        $this
            ->customerService
            ->expects($this->exactly(  1))
            ->method('getCustomer')
            ->willReturn($getCustomerWillReturn);

        $this->assertEquals($this->customerController->getCustomerAction($parameterBag), $expect);
    }

    public function getCustomerActionData(): array
    {
        return [
            'customerID is greater than 0' => [
                'parameterBag' => [
                    'id' => 1,
                    'rule' => 'resetName'
                ],
                'getCustomerWillReturn' => (new Customer())->setName('Norbert')->setEmail('norbert@glambou.com'),
                'expect' => (new Customer())->setName('')->setEmail('norbert@glambou.com Make it happen'),
            ],
            'Rule resetName not sent' => [
                'parameterBag' => [
                    'id' => 2,
                ],
                'getCustomerWillReturn' => (new Customer())->setName('Bob Marley')->setEmail('bob@marley.com'),
                'expect' => (new Customer())->setName('Bob Marley')->setEmail('bob@marley.com Make it happen'),
            ],
        ];
    }

    /**
     * @dataProvider getCustomerActionThrowsInvalidCustomerIdData
     */
    public function testGetCustomerActionThrowsInvalidCustomerId(array $parameterBag): void
    {
        $this->expectException(\Exception::class);

        $this->customerController->getCustomerAction($parameterBag);

    }

    /**
     *
     * @return array
     */
    public function getCustomerActionThrowsInvalidCustomerIdData(): array
    {
        return [
            'customer ID is 0' => [
                'parameterBag' => [
                    'id' => 0,
                ],
            ],
            'customer ID is less than 0' => [
                'parameterBag' => [
                    'id' => -1,
                ],
            ],
            'customer ID is null ' => [
                'parameterBag' => [],
            ],
        ];
    }

    /**
     * @dataProvider getCustomerActionThrowsCustomerNotFoundData
     */
    public function testGetCustomerActionThrowsCustomerNotFound(array $parameterBag): void
    {
        $this->expectException(\Exception::class);

        $this
            ->customerService->expects($this->once())->method('getCustomer')->willReturn(NULL);

        $this->expectExceptionMessage('I dont have customer');
        $this->customerController->getCustomerAction(['id' => 1]);
    }

    public function getCustomerActionThrowsCustomerNotFoundData(): array
    {
        return [
            'customer ID is greater than 0' => [
                'parameterBag' => [
                    'id' => 2
                ]
            ]
        ];
    }
    //testBar
    //testWhatever
    //...
}