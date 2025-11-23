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

    $this->assertEquals($data['name'], $first->title);
});
