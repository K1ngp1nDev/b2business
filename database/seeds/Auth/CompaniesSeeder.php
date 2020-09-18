<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
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
        $this->truncate('companies');

        $companies = [
            [
                'name' => 'Unregistered Company',
                'edrpou' => 'unregistered',
                'ipn' => 'unregistered',
                'p_c' => 'unregistered',
                'company_phone' => 'unregistered',
                'director_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        for ($i = 2; $i < 50; $i++){
            array_push($companies, [
                'name' => 'Company ' . $i,
                'edrpou' => 'edrpou' . $i,
                'ipn' => 'ipn' . $i,
                'p_c' => 'р/с' . $i,
                'company_phone' => $i,
                'director_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        DB::table('companies')->insert($companies);

        $this->enableForeignKeys();
    }
}
