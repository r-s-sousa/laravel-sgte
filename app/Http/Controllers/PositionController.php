<?php

namespace App\Http\Controllers;

use App\Exceptions\NotImplementedMethod;
use App\Http\Requests\PositionRequest;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::paginate();
        return view('position.index', ['positions' => $positions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PositionRequest $request)
    {
        $incomingPosition = $request->validated();
        Position::create($incomingPosition);

        return to_route('position.index')
                ->with('success', 'Posição criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        throw new NotImplementedMethod('PositionController@show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        return view('position.edit', ['position' => $position]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PositionRequest $request, Position $position)
    {
        $incomingPosition = $request->validated();
        $position->update($incomingPosition);

        return to_route('position.index')
                ->with('success', 'Posição atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        // todo: catch exception
        $position->delete();
        return to_route('position.index')->with('success', 'Posição excluída com sucesso!');
    }
}
