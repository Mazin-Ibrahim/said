<?php

namespace App\Interfaces\Customer;

interface CustomerRepositoryInterface
{
    public function getAll();
    public function getCustomer($customer);
    public function create($data);
    public function update($customer, $data);
    public function delete($customer);
}
