<?php

namespace App\Http\Controllers;

use App\Http\Requests\Block\BlockStoreRequest;
use App\Http\Requests\Block\BlockUpdateRequest;
use App\Repositories\BlockRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlockController extends Controller
{

    private $blockRepository;

    function __construct(BlockRepository $blockRepository)
    {
        $this->blockRepository = $blockRepository;
    }

    function index()
    {
        $blocks = $this->blockRepository->paginate(20);
        return response()->json($blocks);
    }

    function store(BlockStoreRequest $request)
    {
        $data = $request->validated();
        $block = $this->blockRepository->create($data);
        return response()->json(['data' => $block], Response::HTTP_CREATED);
    }

    function update(BlockUpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $block = $this->blockRepository->update($id, $data);
        return response()->json(['data' => $block]);
    }

    function show(int $id)
    {
        $block = $this->blockRepository->getById($id);
        return response()->json(['data' => $block]);
    }

    function destroy(int $id)
    {
        $this->blockRepository->destroy($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
