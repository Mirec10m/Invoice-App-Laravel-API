<?php

namespace Tests\Feature\Invoice;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CreateInvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoice_can_be_created()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = Invoice::factory()->raw();
        $data['user_id'] = Auth::user()->id;

        $response = $this->post('/api/invoices', $data);

        $response->assertStatus(201);
        $response->assertJson([
            'number' => $data['number'],
            'variable_symbol' => $data['variable_symbol'],
            'item' => $data['item'],
            'price' => $data['price'],
            'user' => [
                'id' => $data['user_id']
            ]
        ]);
    }
}
