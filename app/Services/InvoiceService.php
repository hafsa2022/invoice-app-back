<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Services\Interfaces\IInvoiceService;
use App\Repositories\Interfaces\IInvoiceRepository;
use App\Repositories\Interfaces\IInvoiceItemRepository;
use App\Models\Invoice;
use App\Models\InvoiceItem;



class InvoiceService implements IInvoiceService
{
    protected $repository;

    public function __construct(IInvoiceRepository $invoiceRepository,IInvoiceItemRepository $invoiceItemRepository)
    {
        $this->repository = $invoiceRepository;
        $this->repositoryItem = $invoiceItemRepository;

    }
    public function addInvoice(Request $request)
    {

         $request->validate([
            'invoice_items'=>'required',
            'client_id'=>'required',
            'car_id'=>'required',
            'compagny_id'=>'required',
            'date'=>'required',
            'advance'=>'required',
            'dueDate'=>'required',
            'amount'=>'required',
            'paymentMethod'=>'required',
            'paidStatus'=>'required',
        ]);

        $invoiceItem = $request->invoice_items;


        if($invoiceItem != null){
            $invoice = new Invoice();
            $invoice->client_id = $request->client_id;
            $invoice->car_id = $request->car_id;
            $invoice->compagny_id = $request->compagny_id;
            $invoice->date = $request->date;
            $invoice->dueDate = $request->dueDate;
            $invoice->advance = $request->advance;
            $invoice->amount = $request->amount;
            $invoice->paymentMethod = $request->paymentMethod;
            $invoice->paidStatus = $request->paidStatus;
            $invoice->memo = $request->memo;

            $invoice = $this->repository->addInvoice($invoice);
        }

        // $invoiceItems = json_decode($invoiceItem, true);

        if($invoiceItem != null){

            foreach ($invoiceItem as $item)
            {
                $invoiceItem = new InvoiceItem();
                $invoiceItem->invoice_id = $invoice->id;
                $invoiceItem->description = $item['description'];
                $invoiceItem->price = $item['price'];
                $invoiceItem->quantity = $item['quantity'];

                $this->repositoryItem->addInvoiceItem($invoiceItem);

            }
        }


        return $invoice;
    }


    public function getInvoices($userId){


        $invoices = $this->repository->getInvoices($userId);

        return $invoices;
    }



    public function deleteInvoice($id){


        $invoice = $this->repository->deleteInvoice($id);

        return $invoice;
    }


    public function updateInvoice(Request $request)
    {
        $request->validate([
            'invoice_items'=>'required',
            'client_id'=>'required',
            'car_id'=>'required',
            'date'=>'required',
            'advance'=>'required',
            'dueDate'=>'required',
            'amount'=>'required',
            'paymentMethod'=>'required',
            'paidStatus'=>'required',
        ]);

        $invoice = Invoice::where('id',$request->id)->first();

        $invoiceItem = $request->input("invoice_items");

        // return response()->json([
        //     "msg"=> $request->id
        // ]);
        return $this->repository->updateInvoice($request);

    }
}
