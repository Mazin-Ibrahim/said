<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Maintenance\MaintenanceRepositoryInterface;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    protected $maintenanceRepository;
    public function __construct(MaintenanceRepositoryInterface $maintenanceRepository)
    {
        $this->maintenanceRepository = $maintenanceRepository;
    }
}
