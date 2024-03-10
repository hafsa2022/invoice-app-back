<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\ICarService;

class CarController extends Controller
{
    private ICarService $carService;

    public function __construct(ICarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCars()
    {
        $cars = $this->carService->getCars();
        return response()->json($cars);
    }
}
