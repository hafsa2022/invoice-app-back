<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceItem;
// use App\Models\Car;
use App\Models\Client;



class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'client_id',
        'car_id',
        'date',
        'dueDate',
        'advance',
        'amount',
        'paymentMethod',
        'paidStatus',
        'memo',
        'compagny_id',
    ];

    protected $with = [
        'invoiceItems',
        'client',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // public function car()
    // {
    //     return $this->belongsTo(Car::class);
    // }

    public function invoiceItems()
    {
        return $this->hasMany(invoiceItem::class);
    }
}
