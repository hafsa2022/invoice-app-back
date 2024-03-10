<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Services\Interfaces\IClientService;
use App\Repositories\Interfaces\IClientRepository;

class ClientService implements IClientService
{
    protected $repository;

    public function __construct(IClientRepository $clientRepository)
    {
        $this->repository = $clientRepository;
    }


    public function getClients(){


        $clients = $this->repository->getClients();

        return $clients;
    }

}
