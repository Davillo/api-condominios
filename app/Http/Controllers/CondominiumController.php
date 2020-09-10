<?php

namespace App\Http\Controllers;

use App\Http\Requests\Condominium\CondominiumStoreRequest;
use App\Http\Requests\Condominium\CondominiumUpdateRequest;
use App\Repositories\CondominiumRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class CondominiumController extends Controller
{
    private $condominiumRepository;

    function __construct(CondominiumRepository $condominiumRepository)
    {
        $this->condominiumRepository = $condominiumRepository;
    }

    function index()
    {
        $condominiums = $this->condominiumRepository->paginate(15);
        return response()->json($condominiums);
    }

    function store(CondominiumStoreRequest $request)
    {
        $data = $request->validated();

        $condominiumData = Arr::except($data, 'blocks');
        $blocksData = Arr::only($data, 'blocks');

        $condominium = $this->condominiumRepository->create($condominiumData);
        $condominium->blocks()->attach($blocksData['blocks']);

        return response()->json(['data' => $condominium->refresh()], Response::HTTP_CREATED);
    }

    function update(CondominiumUpdateRequest $request, int $id)
    {
        $data = $request->validated();

        $condominiumData = Arr::except($data, 'blocks');
        $blocksData = Arr::only($data, 'blocks');

        $condominium = $this->condominiumRepository->update($id, $condominiumData);

        if(isset($blocksData['blocks'])){
            $condominium->blocks()->detach();
            $condominium->blocks()->attach($blocksData['blocks']);
        }

        $condominium->refresh();
        return response()->json(['data' => $condominium]);
    }

    function show(int $id)
    {
        $condominium = $this->condominiumRepository->getById($id);
        return response()->json(['data' => $condominium]);
    }

    function destroy(int $id)
    {
        $condominium = $this->condominiumRepository->getById($id);

        if(count($condominium->blocks) > 0){
            return response()->json(['message' => 'Não foi possível excluir o condomínio pois o mesmo possui blocos vinculados.'], Response::HTTP_CONFLICT);
        }

        $condominium->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
