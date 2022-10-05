<?php

namespace Tests\Feature\Customer;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestroyCustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_can_be_destroyed()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $customer = Customer::factory()->create();
        $customer->user()->associate($user)->save();

        $response = $this->delete('/api/customers/' . $customer->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('customers', ['id' => $customer->id]);
    }
}
