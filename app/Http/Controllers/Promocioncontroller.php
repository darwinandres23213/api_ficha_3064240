<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PromocionService;
use App\Http\Requests\RequestPromocion;
use App\Http\Requests\UpdatePromocionRequest;

class Promocioncontroller extends Controller
{
    public function __construct(private PromocionService $promocionServicio)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promociones = $this->promocionServicio->list();

        return response()->json($promociones, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestPromocion $request)
    {
        $promocion = $this->promocionServicio->store($request->validated());

        return response()->json($promocion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $promocion = $this->promocionServicio->show($id);

        return response()->json($promocion, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromocionRequest $request, int $id)
    {
        $promocion = $this->promocionServicio->update($id, $request->validated());

        return response()->json($promocion, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $this->promocionServicio->destroy($id);

        return response()->json(null, 204);
    }
}