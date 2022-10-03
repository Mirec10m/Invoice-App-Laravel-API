<?php

namespace Tests\Feature\Customer;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListCustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_customers_can_be_listed()
    {
        $this->actingAs(User::factory()->create());
        Customer::factory(40)->create();

        $response = $this->get('/api/customers');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                [
                    'id', 'name', 'business_id', 'tax_id'
                ]
            ]
        ]);
        $response->assertJsonCount(20, 'data');
    }
}
