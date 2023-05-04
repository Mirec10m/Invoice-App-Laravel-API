<?php

namespace Tests\Feature\Invoice;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SumInvoicesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_can_get_sum_of_all_invoices(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $invoices = Invoice::factory(10)->create(['user_id' => $user->id]);
        $this->assertDatabaseCount('invoices', 10);
        $this->assertModelExists($invoices->first());

        $sum = Invoice::where('user_id', $user->id)->sum('sum');

        $response = $this->get('/api/invoices/get/sum');

        $response->assertContent($sum);
        $response->assertStatus(200);
    }
}
