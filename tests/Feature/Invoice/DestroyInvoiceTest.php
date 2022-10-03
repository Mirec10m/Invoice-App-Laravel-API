<?php

namespace Tests\Feature\Invoice;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DestroyInvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoice_can_be_destroyed()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $invoice = Invoice::factory()->create();

        $response = $this->delete('/api/invoices/' . $invoice->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('invoices', ['id' => $invoice->id]);
    }
}
