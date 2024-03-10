<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;
use App\Models\InvoiceItem;



interface IInvoiceItemRepository
{

    public function addInvoiceItem(InvoiceItem $invoiceItem);

    public function deleteInvoiceItem($id);
}
