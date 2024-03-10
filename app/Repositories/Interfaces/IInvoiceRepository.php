<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;
use App\Models\Invoice;



interface IInvoiceRepository
{
    public function getInvoices($id);

    public function addInvoice(Invoice $invoice);

    public function deleteInvoice($id);

    public function updateInvoice(Request $request);

}
