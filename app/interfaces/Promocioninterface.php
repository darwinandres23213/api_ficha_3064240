<?php

namespace App\Interfaces;

interface PromocionInterface extends BaseInterfaces
{
    public function getByEstado(bool $estado);

    public function getByEvento(int $eventoId);

    public function getByReference(string $referencia);
}