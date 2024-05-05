<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\PositionRequest;
use App\Exceptions\NotImplementedMethod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Throwable;

class PositionController extends Controller
{
    private const int ITEMS_PER_PAGE = 8;

    public function index(): View
    {
        $positions = Position::query()
            ->orderBy('priority', 'desc')
            ->paginate(self::ITEMS_PER_PAGE);

        return view('position.index', ['positions' => $positions]);
    }

    public function search(SearchRequest $request): View|RedirectResponse
    {
        $validatedData = $request->validated();
        $search = $validatedData['search'];

        if (!$search) {
            return Redirect::route('position.index');
        }

        $positions = Position::query()
            ->where('name', 'ilike', '%' . $search . '%')
            ->orWhere('shortName', 'ilike', '%' . $search . '%')
            ->orderBy('priority', 'desc')
            ->paginate(self::ITEMS_PER_PAGE)
            ->appends(['search' => $search]);

        return view('position.index', ['positions' => $positions, 'search' => $search]);
    }

    public function create(): View
    {
        return view('position.create');
    }

    public function store(PositionRequest $request): RedirectResponse
    {
        $incomingPosition = $request->validated();
        $position = Position::create($incomingPosition);

        return Redirect::route('position.index')
                ->with('success_message', "Posição: '{$position->name}' criada com sucesso!");
    }

    public function show(Position $position): Throwable
    {
        throw new NotImplementedMethod('PositionController@show');
    }

    public function edit(Position $position): View
    {
        return view('position.edit', ['position' => $position]);
    }

    public function update(PositionRequest $request, Position $position): RedirectResponse
    {
        $oldName = $position->name;
        $incomingPosition = $request->validated();
        $position->update($incomingPosition);

        return Redirect::route('position.index')
            ->with('success_message', "Posição: '{$oldName}' atualizada!");
    }

    public function destroy(Position $position, Request $request): RedirectResponse
    {
        $positionName = $position->name;
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $position->delete();

        return Redirect::route('position.index')
            ->with('success_message', "Posição: '{$positionName}' excluída!");
    }
}
