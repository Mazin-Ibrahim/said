<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Maintenance\storeRequest;
use App\Interfaces\Maintenance\MaintenanceRepositoryInterface;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    protected $maintenanceInterface;
    public function __construct(MaintenanceRepositoryInterface $maintenanceInterface)
    {
        $this->maintenanceInterface = $maintenanceInterface;
    }

    public function index()
    {
        $maintenances=  $this->maintenanceInterface->getAll();
        return response()->json($maintenances,200);
    }

    public function getMaintenance(Maintenance $maintenance)
    {
        $maintenance = $this->maintenanceInterface->getMaintenance($maintenance);
        return response()->json($maintenance,200);
    }

    public function store(storeRequest $request)
    {
        $maintenance = $this->maintenanceInterface->create($request->only(['worker_id','customer_id','location_name','price']));
        return response()->json($maintenance,201);
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $maintenance = $this->maintenanceInterface->update($request->only(['worker_id','customer_id','location_name','price']),$maintenance);
        return response()->json($maintenance,204);
    }

    public function delete(Maintenance $maintenance)
    {
         $this->maintenanceInterface->delete($maintenance);
        return response()->json(null,204);
    }

}
