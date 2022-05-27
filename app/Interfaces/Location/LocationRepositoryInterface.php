<?php 

namespace App\Interfaces\Location;

Interface LocationRepositoryInterface {
    public function getAll();
    public function getLocation($location);
    public function create($request);
    public function update($request,$location);
    public function delete($location); 
}