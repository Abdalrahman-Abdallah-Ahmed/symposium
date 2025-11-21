<?php
use App\Models\User;
use App\Models\Talk;
use App\Enums\TalkType;

test('user can create a talk', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->post(route('talks.store'),[
            'user_id' => $user->id,
            'title' => $title = fake()->sentence(),
            'type' => fake()->randomElement(TalkType::cases())->value,
            'length' => rand(15,60),
            'abstract' => fake()->paragraph(),
            'organizer_notes' => fake()->paragraph()
        ]);

    $response->assertRedirect(route('talks.index'));

    $this->assertDatabaseHas('talks',[
        'title' => $title
    ]);
});
