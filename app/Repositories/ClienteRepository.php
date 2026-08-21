<?php

namespace App\Repositories;

use App\Interfaces\ClienteInterface;
use App\Models\Cliente;

class ClienteRepository extends BaseRepository implements ClienteInterface
{   public function __construct(Cliente $clienteModel)
    {
        parent::__construct($clienteModel);
    }
    public function getByName (String $name)
    {
        $clientes = $this->model->where('nombre', "LIKE", "%{$name}%")
                                ->get();
        if($clientes->Empty()) 
        {
        return null;
        }
        return $clientes;
    }

    public function getByLastname (String $lastname)
    {
        $clientes = $this->model->where('apellidos', "LIKE", "%{$lastname}%")
                                ->get();
        if($clientes->Empty()) 
        {
        return null;
        }
        return $clientes;
    }

    public function getByDocument (String $document)
    {
        $clientes = $this->model->where('documento', $document)
                                ->get();
        if($clientes->Empty()) 
        {
        return null;
        }
        return $clientes;
    }
}
