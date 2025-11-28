<?php

use App\Console\Commands\ImportConferences;
use App\Models\Conference;

test('it import conferences', function () {
    $command = new ImportConferences;

    $data =[
        'name' => 'Test Conference',
        '_rel' => [
            'cfp_uri' => 'v1/cfp/uiaoosdfhh8q2645342'
            ]
        ];
    $command->importOrUpdateConference($data);

    $first = Conference::first();

    $this->assertEquals($first->title,$data['name']);
});

test('it updates the conferences', function(){
    $command = new ImportConferences;

    $conference = Conference::create([
        'callingallpapers_id' => 'v1/cfp/uiaoosdfhh8q2645342',
        'title' => 'Old Title'
    ]);
    $data =[
        'name' => 'Test Conference',
        '_rel' => [
            'cfp_uri' => 'v1/cfp/uiaoosdfhh8q2645342'
            ]
        ];

        $command->importOrUpdateConference($data);

        $first = Conference::first();

        $this->assertEquals($first->title ,$data['name']);
        $this->assertEquals(1, Conference::count());
});
