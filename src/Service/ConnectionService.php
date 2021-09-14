<?php declare(strict_types=1);

namespace Glambou\Service;

use Glambou\Model\Customer;

class ConnectionService implements ConnectionServiceInterface
{
    private string $connectionString;

    /**
     * @param string $connectionString
     */
    public function __construct(string $connectionString)
    {
        $this->connectionString = $connectionString;
    }

    /**
     * @return string
     */
    public function connect(): string
    {
        //if connection string is valid
        //else throw exception
        //Create a new Adapter
        //Add connection information in the adapter
        //try connecting
        //catch ConnectionException
        //...
        return "I do complex stuff";
    }

    // ORM ABSTRACTION :P
    /**
     * @return array
     */
    public function findAllCustomers(): array
    {
       return [
           new Customer(),
           new Customer(),
           new Customer(),
       ];
    }

    /**
     * @return array
     */
    public function findCustomer(): array
    {
        return [
            (new Customer())
                ->setAddress('My Address')
                ->setName('John Doe')
                ->setEmail('j.doe@glambou.com'),
        ];
    }
}