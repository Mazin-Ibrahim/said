<?php 

namespace App\Interfaces\Invoice;



Interface InvocieReportsInterface {
    public function getInvoicesBayDay($date);
    public function getSalesByPeriodDate($startDate, $endDate);
    public function getSalesBySpecificCustomer($customer_id);
    public function getProductSalesByPeroidDate($startDate, $endDate,$product_id);
    public function getTotalSalesOnMonth();
}