<?php

namespace Tests\Feature\Invoice;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateInvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoice_can_be_updated()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $invoice = Invoice::factory()->create(['item' => 'Original text']);

        $data = [
            'item' => 'New text'
        ];

        $response = $this->put('/api/invoices/' . $invoice->id, $data);

        $response->assertStatus(202);
        $response->assertJson(['item' => 'New text']);
    }
}
