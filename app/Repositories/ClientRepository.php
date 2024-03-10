<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IClientRepository;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ClientRepository implements IClientRepository
{
    public function getClients()
    {
        $clients = DB::table('clients')
                    ->get();
         return $clients;
    }
}
