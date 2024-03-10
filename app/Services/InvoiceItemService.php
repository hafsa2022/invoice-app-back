<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Services\Interfaces\IInvoiceItemService;
use App\Repositories\Interfaces\IInvoiceItemRepository;
use App\Repositories\Interfaces\IInvoiceItemItemRepository;
use App\Models\InvoiceItem;



class InvoiceItemService implements IInvoiceItemService
{
    protected $repository;

    public function __construct(IInvoiceItemRepository $invoiceItemRepository)
    {
        $this->repository = $invoiceItemRepository;

    }
        public function deleteInvoiceItem($id){


        $invoiceItem = $this->repository->deleteInvoiceItem($id);

        return $invoiceItem;
    }
}
