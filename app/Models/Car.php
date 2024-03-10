<?php

namespace App\Models;
use App\Models\Invoice;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';

    protected $fillable = [
        'chassisNumber',
        'brand',
        'model',
        'carType',
        'transmission',
        'firstRegistration',
        'mileage',
        'enginePower',
        'cylinder',
        'fuel',
        'co2',
        'color',
        'numberKeys',
        'cerOfConf',
        'inspectionForm',
        'carPass',
        'registerCert',
        'compagny_id'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
