<?php

namespace App\Services;

use App\Interfaces\Repositories\RolInterface;

class RolServices
{
    public function__construct(
        private RolInterface $RolRepository
    ){}

    public function list()
    {
        return $this->RolRepository->all();
    }

    public function show(int $id)
    {
        return $this->RolRepository->find(id);
    }

    public function store(array $data);
    {
        return $this->RolRepository->create(id,$data);
    }

    public function update(int $id, array $data)
    {
        return $this->RolRepository->update($id, $data),
    }

    public function destroy(int $id)
    {
        return $this->RolRepository->delete($id);
    }

    public function getByName 
}