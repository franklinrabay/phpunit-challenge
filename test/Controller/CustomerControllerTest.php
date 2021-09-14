<?php

namespace Glambou\Test\Controller;

use Glambou\Model\Customer;

// MOCKING - DEPENDENCY INJECTION
// DATAPROVIDERS - USE CASES
// HANDLE EXCEPTIONS - DIFFERENT TEST CASE


class CustomerControllerTest extends \PHPUnit\Framework\TestCase
{
    public function testFoo(): void
    {
        $customer = new Customer();

        $customer->setName('Foo');

        $this->assertEquals('Bar', $customer->getName());

        $this->assertInstanceOf(Customer::class, $customer);
    }

}