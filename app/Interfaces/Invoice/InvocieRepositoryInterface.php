<?php

namespace App\Interfaces\Invoice;


Interface InvocieRepositoryInterface {
    
    public function getAll($request);
    public function getInvoice($invoce);
    public function create($request);
    public function update($request,$invoice);
    public function delete($invoce); 

} 