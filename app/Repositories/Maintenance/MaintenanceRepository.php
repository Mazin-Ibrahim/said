<?php


namespace App\Repositories\Maintenance;

use App\Models\Maintenance;
use App\Interfaces\Maintenance\MaintenanceRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MaintenanceRepository implements MaintenanceRepositoryInterface
{
    public function getAll()
    {
        return Maintenance::with('maintenancesPaymentDetails', 'HistoryVisitsMaintenance')->get();
    }

    public function getMaintenance($maintenance)
    {
        return $maintenance->load('worker', 'customer', 'location', 'HistoryVisitsMaintenance', 'maintenancesPaymentDetails');
    }

    public function create($data)
    {
        // dd($data);
        // return Maintenance::create($data);

        DB::beginTransaction();
        try {
            $maintenance = new Maintenance();
            $maintenance->worker_id = $data['worker_id'];
            $maintenance->customer_id = $data['customer_id'];
            $maintenance->customer_name = $data['customer_name'];
            $maintenance->location_name = $data['location_name'];
            $maintenance->location_id = $data['location_id'];
            $maintenance->address = $data['address'];
            $maintenance->description = $data['description'];
            $maintenance->contract_price = $data['contract_price'];
            $maintenance->save();

            collect($data['payments'])->each(function ($payment) use ($maintenance) {
                $maintenance->maintenancesPaymentDetails()->create([
                    'amount' => $payment['amount'],
                    'date' => $payment['date'],
                ]);
            });

            collect($data['visits'])->each(function ($visit) use ($maintenance) {
                $maintenance->HistoryVisitsMaintenance()->create([
                    'date' => $visit['date']
                ]);
            });
            DB::commit();
            return $maintenance->load('maintenancesPaymentDetails', 'HistoryVisitsMaintenance');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
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

    public function updateMaintenanceVisit($data, $maintenance)
    {

        collect($data['visits'])->each(function ($visit) use ($maintenance) {
            $maintenance->HistoryVisitsMaintenance()->where('date', $visit['date'])->update([
                'status' => $visit['status'],
                'description' => $visit['description'],
            ]);
        });

        return $maintenance;
    }
}
