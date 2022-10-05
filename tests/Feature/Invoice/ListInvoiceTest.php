<?php

namespace Tests\Feature\Invoice;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListInvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoices_can_be_listed()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Invoice::factory(40)->create([
            'user_id' => $user->id
        ]);

        $response = $this->get('/api/invoices');

        $response->assertStatus(200);
        $response->assertJsonCount(20, 'data'); // paginated by 20
        $response->assertJsonStructure([
            'data' => [
                [
                    'id', 'number', 'variable_symbol', 'due_at', 'item', 'price'
                ]
            ]
        ]);
    }

    public function test_current_user_can_retrieve_only_his_invoices()
    {
        $user = User::factory()->create();
        Invoice::factory(10)->create([
            'user_id' => $user->id
        ]);

        $another_user = User::factory()->create();
        Invoice::factory(10)->create([
            'user_id' => $another_user->id
        ]);

        $this->actingAs($user);

        $response = $this->get('/api/invoices');

        $this->assertDatabaseCount('invoices', 20);
        $response->assertJsonCount(10, 'data');
        $response->assertStatus(200);
    }
}
