<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListItemsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * Test that a an auth user can view list items.
     * @test
     *
     * @return status 401
     */
    public function auth_user_can_view_list_items()
    {      
        $this->user();

        $this->call('GET', '/list_items')
            ->assertOk();
    }

    /**
     * Test that a an auth user can view list items json.
     * @test
     *
     * @return status 401
     */
    public function auth_user_can_view_list_items_json()
    {
        $this->user();

        $this->json('GET', '/list_items')
            ->assertOk();
    }

    /**
     * Test validation for when the description is blank.
     * @test
     *
     * @return status 422
     */
    public function description_is_required()
    {
        $this->user();

        $data = [
            'description' => '',
        ];

        $this->json('POST', '/list_items', $data)->assertStatus(422);
    }

    /**
     * Test that a user can create a list item
     * @test
     *
     * @return status 200
     */
    public function auth_user_can_create_a_list_item()
    {
        $this->user();

        $data = [
            'description' => $this->faker->sentence(),
        ];

        $this->json("POST", "/list_items", $data)
            ->assertOk()
            ->assertJsonFragment($data);
            
        $this->assertDatabaseHas('list_items', $data);
    }
}
