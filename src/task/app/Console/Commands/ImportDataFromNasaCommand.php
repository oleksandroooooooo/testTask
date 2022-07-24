<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\NearEarthObject;
use Illuminate\Console\Command;

class ImportDataFromNasaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:nasadata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from NASA';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'feed', [
            'query' => [
                'start_date' => date('Y-m-d H:i:s',strtotime("-3 days")),
                'end_date' => date('Y-m-d H:i:s'),
                'api_key' => env('NASA_API_KEY')
            ]
        ]);
        $data = json_decode($response->getBody()->getContents());
        foreach ($data->near_earth_objects as $objects) {
            foreach ($objects as $object) {
                NearEarthObject::firstOrCreate([
                    'name' => $object->name
                ], [
                    'date' => $object->close_approach_data[0]->close_approach_date,
                    'reference' => $object->neo_reference_id,
                    'name' => $object->name,
                    'speed' => $object->close_approach_data[0]->relative_velocity->kilometers_per_hour,
                    'is_hazardous' => $object->is_potentially_hazardous_asteroid,
                ]);
            }
        }
    }
}
