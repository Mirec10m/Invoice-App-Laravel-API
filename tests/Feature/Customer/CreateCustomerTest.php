<?php

namespace Tests\Feature\Customer;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateCustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_model_can_be_instantiated()
    {
        $customer = Customer::factory()->create();

        $this->assertModelExists($customer);
    }

    public function test_customer_can_be_created()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = Customer::factory()->raw();

        $response = $this->post('/api/customers', $data);

        $response->assertStatus(201);
        $response->assertJson($data);
    }
}
