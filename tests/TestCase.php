<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Method to generate a user.
     *
     * @return $user
     */
    protected function user()
    {
        $user = factory(User::class)->create();
        
        $this->actingAs($user);

        return $user;
    }
}
