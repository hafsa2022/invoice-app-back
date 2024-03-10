<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Services\Interfaces\ICarService;
use App\Repositories\Interfaces\ICarRepository;

class CarService implements ICarService
{
    protected $repository;

    public function __construct(ICarRepository $carRepository)
    {
        $this->repository = $carRepository;
    }


    public function getCars(){


        $cars = $this->repository->getCars();

        return $cars;
    }

}
