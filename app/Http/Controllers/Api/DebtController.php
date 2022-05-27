<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Debt\storeRequest;
use Illuminate\Http\Request;
use App\Interfaces\Worker\WorkerDebtInterface;
use App\Models\Worker;

class DebtController extends Controller
{
    protected $debtInterface;
    public function __construct(WorkerDebtInterface $workerDebtInterface){
            $this->debtInterface = $workerDebtInterface;
    }

    public function store(storeRequest $request,Worker $worker)
    {
       
        $debt = $this->debtInterface->createDebt($request,$worker);

        return response()->json($debt,201);
    }

    public function getWorkesDebts(Worker $worker)
    {
        
        $workerDebts = $this->debtInterface->getWorkesDebts($worker);
        return response()->json($workerDebts,201);


    }

   
}
