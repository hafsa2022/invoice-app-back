<?php

namespace App\Http\Controllers;
use App\Services\Interfaces\IClientService;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    private IClientService $clientService;

    public function __construct(IClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function getClients()
    {
        $clients = $this->clientService->getClients();
        return response()->json($clients);
    }
}
