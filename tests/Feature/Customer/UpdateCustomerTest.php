<?php

namespace Tests\Feature\Customer;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateCustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_be_updated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $customer = Customer::factory()->create(['city' => 'Nitra']);

        $data = [
            'city' => 'Bratislava'
        ];

        $response = $this->put('/api/customers/' . $customer->id, $data);

        $response->assertStatus(202);
        $response->assertJson(['city' => 'Bratislava']);
    }
}
