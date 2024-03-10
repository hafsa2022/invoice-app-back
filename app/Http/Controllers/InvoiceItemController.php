<?php

namespace App\Http\Controllers;
use App\Services\Interfaces\IInvoiceItemService;


class InvoiceItemController extends Controller
{
    private IInvoiceItemService $invoiceItemService;

    public function __construct(IInvoiceItemService $invoiceItemService)
    {
        $this->invoiceItemService = $invoiceItemService;
    }

     public function deleteInvoiceItem($id){

        $invoiceItem = $this->invoiceItemService->deleteInvoiceItem($id);

        return response()->json($invoiceItem);
     }


}
