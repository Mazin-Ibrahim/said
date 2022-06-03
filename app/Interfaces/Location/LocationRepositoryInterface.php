<?php

namespace App\Interfaces\Location;

interface LocationRepositoryInterface
{
    public function getAll();
    public function getLocation($location);
    public function create($request);
    public function update($request, $location);
    public function delete($location);
    public function getPaymentDetails($location);
    public function collectionLocationPayment($location, $request);
    public function updateStatusProduct($location, $request);
}
