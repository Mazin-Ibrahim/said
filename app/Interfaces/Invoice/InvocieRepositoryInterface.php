<?php

namespace App\Interfaces\Invoice;


Interface InvocieRepositoryInterface {
    
    public function getAll($request);
    public function getInvoice($invoce);
    public function create($request);
    // public function updtae($request,$invoce);
    public function delete($invoce); 

} 