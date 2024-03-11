<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice</title>
    <link href="" rel="stylesheet">
    <style>
    .container {
        margin : 2rem;
        margin-top: 20px;

    }

    .border {
        border: 1px solid #ccc;
    }

    .bg-light {
        background-color: #f8f9fa;
    }

    .mb-3 {
        margin-bottom: 20px;
    }

    .mt-3 {
        margin-top: 20px;
    }

    .g-2 > [class^='col-'], .g-2 > [class*=' col-'] {
        padding-right: 1rem;
        padding-left: 1rem;
    }

    .float-start {
        float: left;
    }

    .float-end {
        float: right;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        border-collapse: collapse;
        margin-left:1rem;
    }

    .table th,
    .table td{
        padding: 0.75rem;
        vertical-align: top;
        border-bottom: 1px solid #dee2e6;
    }

    .row {
        margin-right: -15px;
        margin-left: -15px;
        width:100%
    }

    .col {
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .col-md-12 {
        flex: 0 0 100%;
        max-width: 100%;
    }

    .hr {
        border-top: 1px solid #dee2e6;
        margin: 1rem 0;
    }

    .text-center {
        text-align: center;
    }

    .text-end {
        text-align: end;
    }
    .right-content {
        margin-left: auto;
    }
    .left-content{
        margin-right: auto;
    }
	.parent {
		margin-top: 20px;
        margin-bottom:0;
		padding: 1rem;
        margin-right: -15px;
        margin-left: -15px;
        width:100%
	}
	.child1 {
		width: 40%;
		padding: 1rem 1rem;
		display: inline-block;
	}
    .child2 {
		width: 46%;
		padding: 1rem 1rem;
		display: inline-block;
        text-align: right;
	}
    </style>
</head>
<body>
    <div class="container">

            <div class="parent">
                    <div class="child1"><h1>{{ $setting->company_name }}</h1></div>
                    <div class="child2">
                        <p> {{ $setting->street }}, {{ $setting->city }}, {{ $setting->country }}</p>
                        <p> <small> Email: {{ $setting->owner_email }} Téléphone: {{$setting->owner_phone}}</small></p>
                    </div>
            </div>
            <hr>
            <div class="parent">
                <div class="child1">
                    <p> <strong>Destinataire</strong></p>
                    <p>{{ $client->firstname }} {{ $client->surname }}</p>
                    <p>{{ $client->street }},{{$client->city}}</p>
                    <p>{{ $client->country }}</p>

                </div>
                <div class="child2">
                    <div class="row col"><strong><p><span class="float-start">Facture</span> <span class="float-end"> {{$invoice->id}}</span></p></strong></div>
                    <div class="row col"><p><span class="float-start">Date de facture</span> <span class="float-end"> {{ $invoice->date }}</span></p></div>
                    <div class="row col"><p><span class="float-start">Date d'échéance </span> <span class="float-end"> {{ $invoice->dueDate }}</span></p></div>
                </div>
            </div>
            <hr>
            <div class="row mb-3 mt-3">

                    <div class="col-md-12" class="table-responsive">
                    <table  class="table">
                    <thead>
                        <tr>
                            <th class="text-start">Description</th>
                            <th class="text-center">Prix</th>
                            <th class="text-center">Quantité</th>
                            <th class="text-center">TVA</th>
                            <th class="text-end">Montant</th>
                        </tr>
                    </thead>
                        <tbody> @foreach($invoice->invoiceItems as $item)
                            <tr>
                                <td class="text-center">{{ $item->description}}</td>
                                <td class="text-center">{{ round($item->price,2)}}</td>
                                <td class="text-center">{{ $item->quantity}}</td>
                                <td class="text-center">20%</td>
                                <td class="text-center">{{ round(($item->quantity * $item->price),2)}}</td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>

               </div>

            </div>
            <hr>
            <div class="parent" >
                <div class="child1"></div>
                <div class="child2 " >
                    <div class="row col">
                        <p><span class="float-start">Sous-total HT</span> <span class="float-end"> {{$invoice->amount}}</span></p>
                    </div>
                    <div class="row col">
                        <p><span class="float-start">TVA 20% de {{$invoice->amount}}</span> <span class="float-end"> {{ round(($invoice->amount * 0.02), 2)}}</span></p>
                    </div>
                    <div class="row col mb-3">
                       <strong> <p> <span class="float-start">Montant Total EUR</span> <span class="float-end"> {{round($invoice->amount + ($invoice->amount * 0.02), 2)}}</span></p></strong>
                    </div>
                    <br>
                    <hr>
                   <div class="row col">
                       <p><span class="float-start">Montant payé</span> <span class="float-end"> {{$invoice->advance}}</span></p>
                   </div>
                   <div class="row col">
                       <strong><p> <span class="float-start">Montant à payer (EUR)</span> <span class="float-end"> {{round((($invoice->amount + ($invoice->amount * 0.02)) - $invoice->advance), 2)}}</span></p></strong>
                   </div>

                </div>
            </div>


    </div>


</body>
</html>
