<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Maintenance\storeRequest;
use App\Interfaces\Maintenance\MaintenanceRepositoryInterface;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Worker;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    protected $maintenanceInterface;
    public function __construct(MaintenanceRepositoryInterface $maintenanceInterface)
    {
        $this->maintenanceInterface = $maintenanceInterface;
    }
    public function create()
    {
        $customers = Customer::query()->select('id', 'name')->get();
        $workers = Worker::query()->select('id', 'name')->get();
        $locations = Location::query()->select('id', 'location_name')->get();
        
        return inertia('Dashboard/Maintenance/create', [
            'customers' => $customers,
            'workers' => $workers,
            'locations' => $locations
        ]);
    }

    public function store(storeRequest $request)
    {
        // dd($request->all());
        $this->maintenanceInterface->create($request->only([
               'worker_id',
               'customer_id',
               'customer_name',
               'location_name',
               'location_id',
               'address',
               'description',
               'contract_price',
               'payments',
               'visits',

           ]));

        return redirect()->route('maintenances.index');
    }

    public function index()
    {
        $maintenances = $this->maintenanceInterface->getAll();

        return inertia('Dashboard/Maintenance/index', [
            'maintenances' => $maintenances,
        ]);
    }
}
