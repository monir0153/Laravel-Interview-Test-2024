<?php

namespace App\Http\Controllers;

use App\Http\Requests\State\StoreStateRequest;
use App\Http\Requests\State\UpdateStateRequest;
use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        // $state = State::latest()->paginate(10);
        // $data =  new StateCollection($countries);
        // return Response::successWithPagination($data);
        $state = StateResource::collection(State::latest()->get());
        return Response::success($state);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request): JsonResponse
    {
        State::create($request->validated());
        return Response::success(message: 'State created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state): JsonResponse
    {
        $data = new StateResource($state);
        return Response::success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state): JsonResponse
    {
        $state->update($request->validated());
        return Response::success(message: 'State updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state): JsonResponse
    {
        $state->delete();
        return Response::success(message: 'Country Deleted');
    }

    public function add(): View
    {
        return view('pages.State.add');
    }
    public function view(): View
    {
        return view('pages.State.index');
    }
    public function edit($id): View
    {
        $data = State::find($id);
        return view('pages.State.edit', ['data' => $data]);
    }
}
