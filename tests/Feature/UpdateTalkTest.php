<?php

use App\Enums\TalkType;
use App\Models\Talk;

test('User can update their talk', function () {
    $talk = Talk::factory()->create();

    $response = $this
    ->actingAs($talk->author)
    ->patch(route('talks.update', ['talk'=>$talk]), [
        'title' => 'new title here',
        'type' => TalkType::KEYNOTE->value,
    ]);

    $response
    ->assertSessionHasNoErrors()
    ->assertRedirect(route('talks.show', ['talk'=>$talk]));

    $this->assertEquals('new title here', $talk->refresh()->title);
});
