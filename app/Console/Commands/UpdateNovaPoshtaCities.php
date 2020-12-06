<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use LisDev\Delivery\NovaPoshtaApi2;
use App\Models\NovaPoshtaCity;
use App\Models\NovaPoshtaCityTranslation;

class UpdateNovaPoshtaCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $np = new NovaPoshtaApi2(env('NOVA_POSHTA_KEY'), 'ua');
        $cities = $np->getCities();
        if(!empty($cities) && !empty($cities['data'])){

            NovaPoshtaCityTranslation::truncate();
            DB::statement("SET foreign_key_checks=0");
            NovaPoshtaCity::truncate();
            DB::statement("SET foreign_key_checks=1");

            foreach($cities['data'] as $key => $city){
                if(!empty($city['CityID'])){
                    NovaPoshtaCity::create([
                        'id' => $city['CityID'],
                        'ref' => $city['Ref'],
                        'sort_order' => $key
                    ]);

                    NovaPoshtaCityTranslation::create([
                        'nova_poshta_city_id' => $city['CityID'],
                        'lang_id' => 1,
                        'name' => $city['Description']
                    ]);

                    NovaPoshtaCityTranslation::create([
                        'nova_poshta_city_id' => $city['CityID'],
                        'lang_id' => 3,
                        'name' => $city['DescriptionRu']
                    ]);
                }
            }
        }
    }
}
