<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;


class Setting extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'company_logo',
        'company_name',
        'owner_name',
        'owner_lastname',
        'vat_number',
        'street',
        'zip_code',
        'city',
        'country',
        'owner_email',
        'owner_phone',
        'owner_website',
        'bank_name',
        'bank_account_number',
        'bic_number',
        'bank_name2',
        'bank_account_number2',
        'bic_number2',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
