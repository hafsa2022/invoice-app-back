<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Car;
use App\Models\Client;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;


class PdfController extends Controller
{
    public function generatePdf($id)
    {

    $invoice = Invoice::where('id', $id)->first();
    $items = InvoiceItem::find($id);

    // $items =  DB::table('invoice_items')
    //                 ->where("invoice_items.invoice_id",'=',$id)
    //                 ->get();

    $car = Car::find($invoice->car_id);
    $client = Client::find($invoice->client_id);
    $setting = Setting::find($invoice->compagny_id);



    $pdf = PDF::loadView('invoice',  ['invoice' => $invoice, "items"=>$items, "car"=>$car, "client"=>$client,"setting"=>$setting]);
    $pdf->setPaper('A4' , 'portrait');
    return $pdf->output();
    }
}
