<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface IInvoiceService
{
    public function getInvoices($userId);

    public function addInvoice(Request $request);

    public function deleteInvoice($id);

    public function updateInvoice(Request $request);


}
