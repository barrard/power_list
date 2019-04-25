<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GuestTest extends TestCase
{
    /**
     * A guest can visit the welcome page.
     * @test
     *
     * @return void
     */
    public function guest_can_visit_the_welcome_page()
    {
        $this->call('GET', '/')
            ->assertOk();
    }

    /**
     * A guest can visit the login page.
     * @test
     *
     * @return void
     */
    public function guest_can_visit_the_login_page()
    {
        $this->call('GET', '/login')
            ->assertOk();
    }

    /**
     * A guest can visit the register page.
     * @test
     *
     * @return void
     */
    public function guest_can_visit_the_register_page()
    {
        $this->call('GET', '/register')
            ->assertOk();
    }

    /**
     * A guest cannot visit the home page.
     * @test
     *
     * @return void
     */
    public function guest_cannot_visit_the_home_page()
    {
        $this->call('GET', '/home')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }
}
