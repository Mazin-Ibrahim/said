<?php 

namespace App\Interfaces\Worker;
interface WorkerDebtInterface {

   public function createDebt($data,$worker);
   public function getWorkesDebts($worker);
}