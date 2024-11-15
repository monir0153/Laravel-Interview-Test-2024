<?php

namespace App\Http\Controllers;

use App\Http\Requests\City\StoreCityRequest;
use App\Http\Requests\City\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $data = CityResource::collection(City::latest()->get());
        return Response::success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request): JsonResponse
    {
        City::create($request->validated());
        return Response::created(message: 'State created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city): JsonResponse
    {
        $data = new CityResource($city);
        return Response::success($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city): JsonResponse
    {
        $city->update($request->validated());
        return Response::updated(message: 'City updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city): JsonResponse
    {
        $city->delete();
        return Response::success(message: 'City deleted');
    }

    public function add(): View
    {
        return view('pages.City.add');
    }
    public function view(): View
    {
        return view('pages.City.index');
    }
    public function edit($id): View
    {
        $data = City::find($id);
        return view('pages.City.edit', ['data' => $data]);
    }
}
