<?php

namespace Tests\Feature\Invoice;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LastInvoiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_last_invoice_can_be_get(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $invoices = Invoice::factory(10)->create(['user_id' => $user->id]);
        $last = $invoices->last();

        $response = $this->get('/api/invoices/get/last');

        $response->assertStatus(200);
        $response->assertJson(['id' => $last->id]);
    }

    public function test_get_null_if_there_is_not_invoices(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/api/invoices/get/last');

        $this->assertEmpty($response->getContent());
    }
}
