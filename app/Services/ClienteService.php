<?php

namespace App\Services;

use App\Interfaces\ClienteInterface;

class ClienteService
{
    public function __construct(
        private ClienteInterface $clienteRepository
    ) {}

    public function list()
    {
        return $this->clienteRepository->getAll();
    }

    public function show(int $id)
    {
        return $this->clienteRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->clienteRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->clienteRepository->update($data, $id);
    }

    public function destroy(int $id)
    {
        return $this->clienterRepository->delete($id);
    }

    public function getByName (String $name)
    {
       return $this->clienterRepository->getByName($name);
    }

    public function getByLastname (String $lastname)
    {
        return $this->clienterRepository->getByLastname($lastname);
    }

    public function getByDocument (String $document)
    {
         return $this->clienterRepository->getByDocument($document);
             
    }
}