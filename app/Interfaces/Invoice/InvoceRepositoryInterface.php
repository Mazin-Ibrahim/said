<?php

namespace App\Interfaces\Invocie;


Interface InvocieRepositoryInterface {
    
    public function getAll();
    public function getInvoice($invoce);
    public function create($request);
    // public function updtae($request,$invoce);
    public function delete($invoce);

}