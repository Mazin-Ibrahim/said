<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Customer\storeRequest;
use App\Http\Requests\Api\Customer\updateRequest;
use App\Interfaces\Customer\CustomerRepositoryInterface;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerInterface;

    public function __construct(CustomerRepositoryInterface $customerInterface)
    {
        $this->customerInterface = $customerInterface;
    }

    public function index()
    {
        $customers = $this->customerInterface->getAll();
        return inertia('Dashboard/Customer/index', ['customers' => $customers]);
    }
    public function create(){
        return inertia('Dashboard/Customer/create');
    }

    public function store(storeRequest $request){
      
        $this->customerInterface->create($request->only(['name','phone','address']));
        return redirect()->route('customers.index');
    }

    public function edit(Customer $customer){    
        return inertia('Dashboard/Customer/edit', ['customer' => $customer]);
    }

    public function update(updateRequest $request, Customer $customer){
        $this->customerInterface->update($customer,$request->only(['name','phone','address']));
        return redirect()->route('customers.index');
    }

    public function delete(Customer $customer){
        $this->customerInterface->delete($customer);
        return redirect()->route('customers.index');
    }
        
    
}
