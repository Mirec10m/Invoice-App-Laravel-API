<?php

namespace Tests\Feature\Auth;

use App\Events\UserRegister;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_user_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123'
        ]);

        $this->assertAuthenticated();
        $response->assertStatus(201);
    }

    public function test_user_register_event_send_mail_can_be_dispatched()
    {
        Event::fake();

        $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john.doe@test.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123'
        ]);

        Event::assertDispatched(UserRegister::class);
    }
}
