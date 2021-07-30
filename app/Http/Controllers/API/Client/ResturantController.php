<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Client\ResturantStoreRequest;
use App\Http\Resources\Client\ResturantCollection;
use App\Models\Bank;
use App\Models\Resturant;
use App\Models\ResturantSubcategory;
use App\Models\WorkTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resturants = Resturant::all();

        return new ResturantCollection($resturants);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResturantStoreRequest $request)
    {
        $request->validated();
        $resturantSubcategories = collect($request->resturant_subcategories);

        $resturant = Resturant::create([
            'client_id' => Auth::user()->id,
            'type' => $request->type,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'branches_no' => $request->branches_no,
            'manager_name' => $request->manager_name,
            'manager_phone' => $request->manager_phone,
            'email' => $request->email,
            'commercial_registration_no' => $request->commercial_registration_no,
            'tax_registration_no' => $request->tax_registration_no,
            'services' => $request->services,
            'category' => $request->category,
            'accepted_payment_methods' => $request->accepted_payment_methods,
            'loyalty_points' => $request->loyalty_points,
        ]);
        $resturantSubcategories->each(function($resturantCategory, $key) use($resturant) {
            ResturantSubcategory::create([
                'name' => $resturantCategory,
                'resturant_id' => $resturant->id,
            ]);
        });
        $resturant->bank()->create([
            'name' => $request->bank_name,
            'iban' => $request->iban,
        ]);
        $resturant->workTime()->create([
            'first_period_start' => $request->first_period_start,
            'first_period_end' => $request->first_period_end,
            'second_period_start' => $request->second_period_start,
            'second_period_end' => $request->second_period_end,
        ]);
        $resturant->location()->create([
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'description' => $request->description,
        ]);
        $resturant->loyalityPoint()->create([
            'points' => $request->points,
            'amount' => $request->amount,
        ]);

        return response()->json('Resturant Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resturant $resturant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resturant $resturant)
    {
        //
    }
}
