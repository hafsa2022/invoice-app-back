<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ICarRepository;
use App\Models\Car;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class CarRepository implements ICarRepository
{
    public function getCars()
    {
        $cars = DB::table('cars')
                    ->get();
         return $cars;
    }
}
