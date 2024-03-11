<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IInvoiceRepository;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class InvoiceRepository implements IInvoiceRepository
{
    protected $model;

    public function _construct(Invoice $invoice)
    {
        $this->model = $invoice;
    }

    public function addInvoice(Invoice $invoice)
    {
        $invoice->save();
        return $invoice;
    }


    public function getInvoices($compagnyId)
    {
        $invoices = DB::table('invoices')
                    ->where("invoices.compagny_id",$compagnyId)
                    ->get();

         return DB::table('invoices')
                ->orderBy('id','desc')
                ->get();
    }


    public function deleteInvoice($id)
    {
        $invoiceToDelete = DB::table('invoices')
        ->where('invoices.id', $id)
        ->delete();

        return DB::table('invoices')
        ->orderBy('id','desc')
        ->get();
    }


    public function updateInvoice(Request $request)
    {
        $invoice = Invoice::where('id',$request->id)->first();

        $invoiceItem = $request->input("invoice_items");


        if($invoiceItem != null){

            // $invoice->update([
            //     'client_id' => $request->input('client_id'),
            //     'car_id' => $request->input('car_id'),
            //     'date'=>$request->input('date'),
            //     'dueDate' => $request->input('dueDate'),
            //     'advance' => $request->input('advance'),
            //     'amount' => $request->input('amount'),
            //     'paymentMethod' => $request->input('paymentMethod'),
            //     'paidStatus' => $request->input('paidStatus'),
            //     'memo' => $request->input('memo'),
            //     ]);
            $invoice->client_id=$request->client_id;
            $invoice->car_id=$request->car_id;
            $invoice->date=$request->date;
            $invoice->dueDate=$request->dueDate;
            $invoice->advance=$request->advance;
            $invoice->amount=$request->amount;
            $invoice->paymentMethod=$request->paymentMethod;
            $invoice->paidStatus=$request->paidStatus;
            $invoice->memo=$request->memo;
            $invoice->update($request->all());
        }

        $invoice->invoiceItems()->delete();


        if($invoiceItem != null){

            foreach ($invoiceItem as $item)
            {
                $itemData = new InvoiceItem();
                $itemData->invoice_id = $request->id;
                $itemData->description = $item['description'];
                $itemData->price = $item['price'];
                $itemData->quantity = $item['quantity'];

                $itemData->save();

            }
        }

     }
}
?>
