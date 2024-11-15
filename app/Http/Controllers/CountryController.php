<?php

namespace App\Http\Controllers;

use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Http\Resources\CountryCollection;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        // $countries = Country::latest()->paginate(10);
        // $data =  new CountryCollection($countries);
        // return Response::successWithPagination($data);
        $countries = CountryResource::collection(Country::latest()->get());
        return Response::success($countries);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request): JsonResponse
    {
        Country::create($request->validated());
        return Response::created(message: 'Country created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country): JsonResponse
    {
        $data = new CountryResource($country);
        return Response::success($data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country): JsonResponse
    {
        $country->update($request->validated());
        return Response::updated(message: 'Country updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country): JsonResponse
    {
        $country->delete();
        return Response::success(message: 'Country Deleted');
    }

    public function add(): View
    {
        return view('pages.country.add');
    }
    public function view(): View
    {
        return view('pages.country.index');
    }
    public function edit($id): View
    {
        $data = Country::find($id);
        return view('pages.country.edit', ['data' => $data]);
    }
}
