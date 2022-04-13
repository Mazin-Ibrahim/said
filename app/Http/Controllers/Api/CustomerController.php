<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Customer\storeRequest;
use App\Http\Requests\Api\Customer\updateRequest;
use App\Interfaces\Customer\CustomerRepositoryInterface;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerRepository;
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $customers =  $this->customerRepository->getAll();

        return response()->json($customers, 200);
    }

    public function getCustomer(Customer $customer)
    {
        $customer =  $this->customerRepository->getCustomer($customer);

        return response()->json($customer, 200);
    }

    public function store(storeRequest $request)
    {
        $customer =  $this->customerRepository->create($request->only(['name', 'address', 'phone']));

        return response()->json($customer, 201);
    }

    public function update(updateRequest $request, Customer $customer)
    {
        $customer =  $this->customerRepository->update($customer, $request->only(['name', 'address', 'phone']));

        return response()->json($customer, 204);
    }

    public function delete(Customer $customer)
    {
        $customer =  $this->customerRepository->delete($customer);

        return response()->json($customer, 204);
    }
}
