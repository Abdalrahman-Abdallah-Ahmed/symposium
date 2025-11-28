<?php

use App\Models\Conference;
use App\Models\User;

test('it favorites a conference', function () {
    $conference = Conference::factory()->create();
    $user = User::factory()->create();
    $response = $this
    ->actingAs($user)
    ->post(route('conferences.favorite', compact('conference')));

    $this->assertCount(1, $user->favoriteConferences);
    $this->assertTrue($user->favoriteConferences->contains($conference));
});

test('it unfavorites a conference', function () {
    $conference = Conference::factory()->create();
    $user = User::factory()->create();
    $user->favoriteConferences()->attach($conference->id);
    $response = $this
    ->actingAs($user)
    ->delete(route('conferences.unfavorite', compact('conference')));

    $this->assertCount(0, $user->favoriteConferences);
    // $this->assertTrue($user->favoriteConferences->contains($conference));
});
