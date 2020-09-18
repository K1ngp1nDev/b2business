<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('regions');

        $regions = [
            [
                'name' => 'Київська область',
            ],

            [
                'name' => 'Львівська область',
            ],

            [
                'name' => 'Херсонська область',
            ],

            [
                'name' => 'Харківська область',
            ]
        ];

        DB::table('regions')->insert($regions);

        $this->enableForeignKeys();
    }
}
