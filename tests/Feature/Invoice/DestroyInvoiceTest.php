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
        $invoice->user()->associate($user)->save();

        $response = $this->delete('/api/invoices/' . $invoice->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('invoices', ['id' => $invoice->id]);
    }

    public function test_access_denied_if_invoice_does_not_belong_to_current_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $invoice = Invoice::factory()->create();

        $response = $this->delete('/api/invoices/' . $invoice->id);

        $this->assertDatabaseHas('invoices', ['id' => $invoice->id]);
        $response->assertStatus(404);
    }
}
