<?php


namespace App\Interfaces\Maintenance;

interface MaintenanceRepositoryInterface
{
    public function getAll();
    public function getMaintenance($maintenance);
    public function create($request);
    public function update($request, $maintenance);
    public function delete($maintenance);
}
