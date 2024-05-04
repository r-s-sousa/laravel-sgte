<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\PositionRequest;
use App\Exceptions\NotImplementedMethod;

class PositionController extends Controller
{
    private const int ITEMS_PER_PAGE = 8;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::paginate(self::ITEMS_PER_PAGE);
        return view('position.index', ['positions' => $positions]);
    }

    public function search(SearchRequest $request)
    {
        $validatedData = $request->validated();
        $search = $validatedData['search'];

        if (!$search) {
            return to_route('position.index');
        }

        $positions = Position::query()
            ->where('name', 'ilike', '%' . $search . '%')
            ->orWhere('shortName', 'ilike', '%' . $search . '%')
            ->paginate(self::ITEMS_PER_PAGE)
            ->appends(['search' => $search]);

        return view('position.index', ['positions' => $positions, 'search' => $search]);
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
