<?php

namespace Glambou\Model;

class Customer
{
    public string $name;
    public string $email;
    public string $address;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Customer
     */
    public function setName(string $name): Customer
    {
        $this->name = $name.' Bartosz';

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Customer
     */
    public function setEmail(string $email): Customer
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Customer
     */
    public function setAddress(string $address): Customer
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @param string $append
     *
     * @return $this
     */
    public function appendEmail(string $append): Customer
    {
        $this->email = $this->email.' '.$append;

        return $this;
    }

    /**
     * @return Customer
     */
    public function clearName(): Customer
    {
        $this->name = '';

        return $this;
    }
}