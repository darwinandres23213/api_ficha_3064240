<?php

namespace App\Services;

use App\Interfaces\ArtistaInterface;

class ArtistaService
{
    public function __construct( //nos permite crear\inicializar un objeto
        private ArtistaInterface $ArtistaRepository
    ) {}

    public function list()//list permite listar todos los registros
    {
        return $this->ArtistaRepository->all();
    }

    public function show (int $id)
    {
        return $this->ArtistaRepository->find($id);
    }

    public function store(array $data) //permite crear registros
    {
        return $this->ArtistaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->ArtistaRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->ArtistaRepository->delete($id);
    }

    public function getByRealName(string $nombre_real)
    {
        return $this->ArtistaRepository->getByRealName($nombre_real);
    }

    public function getByEstatus(bool $estado)
    {
        return $this->ArtistaRepository->getByStatus($estado);
    }

    public function getByArtisticName(string $nombre_artistico)
    {
        return $this->ArtistaRepository->getByArtisticName($nombre_artistico);
    }

    public function getByMusicalGenre(string $genero_musical)//
    {
        return $this->ArtistaRepository->getByMusicalGenre($genero_musical);
    }

    public function getByContact(string $contacto)
    {
        return $this->ArtistaRepository->getByContact($contacto);
    }
}