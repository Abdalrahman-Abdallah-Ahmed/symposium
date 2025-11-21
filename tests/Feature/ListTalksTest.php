<?php

use App\Models\User;
use App\Models\Talk;

test('it lists talks on the list talks page', function () {
    $user = User::factory()
    ->has(Talk::factory()->count(2))
    ->create(); 

    $talk = Talk::factory()->create();

    $response = $this
    ->actingAs($user)
    ->get('/talks')
    ->assertSee($user->talks->first()->title)
    ->assertDontSee($talk->title);

    $response->assertOk();
});

test('it shows basic talk details on the talk show page', function(){
    $talk = Talk::factory()->create();

    $response = $this
    ->actingAs($talk->author)
    ->get(route('talks.show', ['talk' => $talk]))
    ->assertSee($talk->title);
    $response->assertOk();

});

test('users cant see others talk show page', function(){
    $talk = Talk::factory()->create();

    $response = $this
    ->actingAs(User::factory()->create())
    ->get(route('talks.show', ['talk' => $talk]))
    ->assertForbidden();

});