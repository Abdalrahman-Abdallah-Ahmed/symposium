<?php

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;

test('it returns speakers data', function () {
    User::factory()->count(3)->create();
    $firstUser  = User::first();
    $response = $this->get('/api/speakers');
    $response
        ->assertJson(
            fn(AssertableJson $json) =>
            $json->has('data', 3)
                ->has(
                    'data.0',
                    fn(AssertableJson $json) =>
                    $json->where('name', $firstUser->name)
                            ->etc()
                )
        );
});