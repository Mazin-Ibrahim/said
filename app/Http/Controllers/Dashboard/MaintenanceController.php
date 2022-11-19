<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Maintenance\storeRequest;
use App\Interfaces\Maintenance\MaintenanceRepositoryInterface;
use App\Models\Customer;
use App\Models\Location;
use App\Models\Maintenance;
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
        
        return view('dashboard/maintenances/create', [
            'customers' => $customers,
            'workers' => $workers,
            'locations' => $locations
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'contract_price' => 'required|numeric',
            'visits' => 'required|string'
        ], [
            'description.required' => 'يجب أدخال وصف للصيانة',
            'contract_price.required' => 'يجب أدخال قيمة العقد',
            'visits.required' => 'يجب أضافة الزيارات',
        ]);

        $data = $request->all();

        $data['visits'] = json_decode($request->visits, true);
        $this->maintenanceInterface->create($data);

        return redirect()->route('maintenances.index');
    }

    public function index()
    {
        $maintenances = $this->maintenanceInterface->getAll();

        return view('dashboard.maintenances.index', [
            'maintenances' => $maintenances,
        ]);
    }

    public function details(Maintenance $maintenance)
    {
        $maintenance = $maintenance->load('HistoryVisitsMaintenance');

        return view('dashboard.maintenances.details', compact('maintenance'));
    }
}
