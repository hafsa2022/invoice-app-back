<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IInvoiceItemRepository;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\DB;


class InvoiceItemRepository implements IInvoiceItemRepository
{
    protected $model;

    public function _construct(InvoiceItem $invoiceItem)
    {
        $this->model = $invoiceItem;
    }

    public function addInvoiceItem(InvoiceItem $invoiceItem)
    {
        $invoiceItem->save();
        return $invoiceItem;
    }

    public function deleteInvoiceItem($id){

        $invoiceToDelete = DB::table('invoice_items')
        ->where('invoice_items.id', $id)
        ->delete();

        return $invoiceToDelete;
    }


}
