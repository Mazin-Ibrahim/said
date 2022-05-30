<?php 


// namespace App\Interfaces\Deportation;
namespace App\Interfaces\Deportation;

interface DeportationRepositoryInterface
{
    public function getAll();
    public function getDeportation($deportation);
    public function create($request);
    public function update($request, $deportation);
    public function delete($deportation);
}