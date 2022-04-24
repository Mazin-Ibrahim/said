<?php


namespace App\Repositories\Customer;

use App\Interfaces\Customer\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function getAll()
    {
        return Customer::all();
    }

    public function getCustomer($customer)
    {
        return $customer;
    }

    public function create($data)
    {
        return Customer::create($data);
    }

    public function update($customer, $data)
    {
        return  $customer->update($data);
    }

    public function delete($customer)
    {
        return  $customer->delete();
    }
}
