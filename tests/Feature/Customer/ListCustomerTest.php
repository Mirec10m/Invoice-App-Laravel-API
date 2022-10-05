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
        $user = User::factory()->create();
        $this->actingAs($user);

        $customers = Customer::factory(40)->create();
        $user->customers()->saveMany($customers);

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

    public function test_current_user_can_retrieve_only_his_customers()
    {
        $user = User::factory()->create();
        $customers = Customer::factory(10)->create();
        $user->customers()->saveMany($customers);

        $another_user = User::factory()->create();
        $another_customers = Customer::factory(10)->create();
        $another_user->customers()->saveMany($another_customers);

        $this->actingAs($user);

        $response = $this->get('/api/customers');

        $this->assertDatabaseCount('customers', 20);
        $response->assertJsonCount(10, 'data');
        $response->assertStatus(200);
    }
}
