<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\IInvoiceService;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    private IInvoiceService $invoiceService;

    public function __construct(IInvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function getInvoices($compagnyId)
    {
        $invoices = $this->invoiceService->getInvoices($compagnyId);
        return response()->json($invoices);
    }

    public function addInvoice(Request $request)
    {

        return response()->json($this->invoiceService->addInvoice($request));
    }

    public function deleteInvoice($id)
    {
       return response()->json($this->invoiceService->deleteInvoice($id));
    }

    public function editInvoice($id)
    {
        return Invoice::with(['invoiceItems','client'])->find($id);
    }

    public function updateInvoice(Request $request)
    {
        // return response()->json(["msg" => $request->id]);
        return response()->json($this->invoiceService->updateInvoice($request));
    }

    // public function updateInvoice(Request $request)
    // {
    //        return response()->json([
    //         "RE"=> "$request"
    //     ]);

    //     // return response()->json($this->invoiceService->addInvoice($request,$id));
    // }


}
