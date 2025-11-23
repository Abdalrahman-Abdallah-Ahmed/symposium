<?php

namespace App\Console\Commands;

use App\Models\Conference;
use App\Services\CallingAllPapers;
use Illuminate\Console\Command;

class ImportConferences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cfps:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(CallingAllPapers $cfps)
    {
        foreach($cfps->conferences()['cfps'] as $conference) {
            $this->importOrUpdateConference($conference);
            // Here you would add logic to save the conference to your database
        }
    }

    public function importOrUpdateConference(array $conferenceData)
    {
        Conference::updateOrCreate(
            ['callingallpapers_id' => $conferenceData['_rel']['cfp_uri']],
            [
                'title' => $conferenceData['name'],

            ]
            );
    }
}
