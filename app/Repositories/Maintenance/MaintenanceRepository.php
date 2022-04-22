<?php


namespace App\Repositories\Maintenance;

use App\Models\Maintenance;
use App\Interfaces\Maintenance\MaintenanceRepositoryInterface;

class MaintenanceRepository implements MaintenanceRepositoryInterface
{
    public function getAll() 
    {
        return Maintenance::paginate(10);
    }

    public function getMaintenance($maintenance)
    {
        return $maintenance;
    }

    public function create($data)
    {
        return Maintenance::create($data);
    }

    public function update($data, $maintenance)
    {
        $maintenance->update($data);
        return $maintenance;
    }

    public function delete($maintenance)
    {
        return $maintenance->delete();
    }
}
