<?php
namespace App\Repositories;

USE App\Interfaces\UsuarioInterface;
USE App\Models\Usuario;

class UsuarioRepository extends BaseRepository implements UsuarioInterface
{
    public function __construct(Usuario $usuarioModel)
    {
        parent::__construct($usuarioModel);
    }

    public function getByRol(int $idRol)
    {
        $usuario = $this ->model->where('idRol', $idRol)->get();
        if($usuario->isEmpty()){
            return null;
        }
        return $usuario;
    }
    public function getByEstatus (bool $status)
    {
        $usuario = $this ->model->where('estado', $status)->get();
        if($usuario->isEmpty()){
            return null;
        }
        return $usuario;
    }
    public function getByName (string $name)
    {
        $usuario =$this ->model->where('nombre', $name)->get();
        if($usuario->isEmpty()){
            return null;
        }
        return $usuario;
    }
} 

