<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HistoryVisitsMaintenance;
use App\Models\MaintenancesPaymentDetails;
use App\Models\PaymentDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentReportController extends Controller
{
    public function getPaymentsReport()
    {
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(7);
        // تاريخ الدفعات للمواقع
        $location_payments_details = PaymentDetails::with('location')->orderBy('payment_received_date', 'asc')->get();
         
        //  تاريخ التحصيل المالي للصيانات
        $maintenances_payment_details =  MaintenancesPaymentDetails::with('maintenance')->orderBy('date', 'asc')->get();

        // //    تاريخ الزيارات في الصيانات

        $history_visits_maintenance =       HistoryVisitsMaintenance::with('maintenance')->orderBy('date', 'asc')->get();



        return [
          'location_payments_details' => $location_payments_details,
          'maintenances_payment_details' => $maintenances_payment_details,
          'history_visits_maintenance' => $history_visits_maintenance,
        ];
    }
}
