<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
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
        $this->truncate('services');

        $services = [
            [
                'name' => 'Service 1',
                'description' => 'Test Service 1 description',
                'price' => rand(10, 200),
                'image' => '/img',
                'validity' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Service 2',
                'description' => 'Test Service 2 description',
                'price' => rand(10, 200),
                'image' => '/img',
                'validity' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('services')->insert($services);

        $this->enableForeignKeys();
    }
}
