<?php

namespace Tests\Feature\API\Client;

use App\Models\Resturant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResturantTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function client_can_store_resturant()
    {
        $resturantSubcategories = [
            0 => 'sub1',
            1 => 'sub2',
        ];

        $this->clientApiLogin();

        $response = $this->post('/api/client/resturants', [
            'type' => config('constants.restaurant_types.0'),
            'name_ar' => 'مطعم',
            'name_en' => 'resturant',
            'branches_no' => 3,
            'manager_name' => 'manager name',
            'manager_phone' => '09995000',
            'email' => 'manager@manager.com',
            'commercial_registration_no' => '4568754',
            'tax_registration_no' => '455552135',
            'bank_name' => 'bok',
            'iban' => '445445',
            'services' => config('constants.restaurant_services'),
            'first_period_start' => '8',
            'first_period_end' => '12',
            'second_period_start' => '12',
            'second_period_end' => '8',
            'longitude' => '111.2',
            'latitude' => '222.1',
            'description' => 'address description',
            'category' => 'category',
            'resturant_subcategories' => $resturantSubcategories,
            'accepted_payment_methods' => config('constants.payment_methods'),
            'loyalty_points' => Resturant::YES,
            'points' => 1,
            'amount' => 1,
        ]);

        $response->assertCreated();

        $this->assertDatabaseHas('resturants', [
            'type' => config('constants.restaurant_types.0'),
            'name_ar' => 'مطعم',
            'name_en' => 'resturant',
            'branches_no' => 3,
            'manager_name' => 'manager name',
            'manager_phone' => '09995000',
            'email' => 'manager@manager.com',
            'commercial_registration_no' => '4568754',
            'tax_registration_no' => '455552135',
            'loyalty_points' => Resturant::YES,
            'category' => 'category',
        ]);
        $this->assertDatabaseHas('banks', [
            'name' => 'bok',
            'iban' => '445445',
        ]);
        $this->assertDatabaseHas('work_times', [
            'first_period_start' => '8',
            'first_period_end' => '12',
            'second_period_start' => '12',
            'second_period_end' => '8',
        ]);
        $this->assertDatabaseHas('locations', [
            'longitude' => '111.2',
            'latitude' => '222.1',
            'description' => 'address description',
        ]);
        $this->assertDatabaseHas('loyality_points', [
            'points' => 1,
            'amount' => 1,
        ]);
    }

    /** @test */
    public function client_can_get_all_resturants()
    {
        $this->clientApiLogin();

        Resturant::factory()->create();

        $response = $this->get('/api/client/resturants');
        $response->assertOk();
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name_ar',
                    'name_en',
                    'branches_no',
                    'manager_name',
                    'manager_phone',
                    'email',
                    'commercial_registration_no',
                    'tax_registration_no',
                    'services',
                    'category',
                    'resturant_subcategories',
                    'accepted_payment_methods',
                    'loyalty_points',
                    'loyality_point',
                    'bank',
                    'work_time',
                    'location',
                ]
            ]
        ]);
    }
}
