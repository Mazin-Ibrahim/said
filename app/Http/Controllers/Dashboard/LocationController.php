<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Interfaces\Location\LocationRepositoryInterface;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Api\Location\storeRequest;

class LocationController extends Controller
{
    protected $locationInterface;

    public function __construct(LocationRepositoryInterface $locationRepositoryInterface)
    {
        $this->locationInterface = $locationRepositoryInterface;
    }
    public function create()
    {
        $customers = Customer::query()->select('id', 'name')->get();
        $products = Product::query()->select('id', 'name')->get();
        return inertia('Dashboard/Location/create', [
            'customers' => $customers,
            'products' => $products
        ]);
    }

    public function store(storeRequest $request)
    {
        $location =  $this->locationInterface->create($request->only([
            'customer_id',
            'address',
            'contract_price',
            'description',
            'received_date',
            'delivery_date',
            'products',
            'payment_details',
            'location_name',
            'customer_name'
        ]));

        return redirect()->route('locations.index');
    }

    public function index()
    {
        $locations = $this->locationInterface->getAll();

        return inertia('Dashboard/Location/index', [
            'locations' => $locations,
        ]);
    }
}
