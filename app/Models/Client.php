<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;


class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $fillable = [
        'isCompany',
        'surname',
        'firstname',
        'companyName',
        'btwNumber',
        'street',
        'postalCode',
        'city',
        'country',
        'email',
        'phonenumber',
        'mobilenumber',
        'compagny_id',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
