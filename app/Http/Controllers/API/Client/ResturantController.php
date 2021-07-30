<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Client\ResturantStoreRequest;
use App\Http\Resources\Client\ResturantCollection;
use App\Models\Resturant;
use Illuminate\Http\Request;

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
        dd($request->all());
        Resturant::create([
            'type' => $request->type,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'branches_no' => $request->branches_no,
            'manager_name' => $request->manager_name,
            'manager_phone' => $request->manager_phone,
            'email' => $request->email,
            'commercial_registration_no' => $request->commercial_registration_no,
            'tax_registration_no' => '455552135',
            'services' => config('constants.restaurant_services'),
            'category' => 'category',
            'resturant_subcategories' => $resturantSubcategories,
            'accepted_payment_methods' => config('constants.payment_methods'),
            'loyalty_points' => Resturant::YES,
            'point' => 1,
            'amount' => 1,

            'bank_name' => 'bok',
            'iban' => '445445',
            'first_period_start' => '8',
            'first_period_end' => '12',
            'second_period_start' => '12',
            'second_period_end' => '8',
            'longitude' => '111.2',
            'latitude' => '222.1',
            'description' => 'address description',
        ])
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
