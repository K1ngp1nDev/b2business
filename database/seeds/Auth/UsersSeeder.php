<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
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
        $this->truncate('users');

        $users = [
            [
                'name' => 'Admin',
                'surname' => 'Admin',
                'patronymic' => 'Admin',
                'email' => 'admin@b.com',
                'password' => bcrypt('admin'),
                'phone' => '0',
                'passport' => '0',
                'company_id' => 2,
//                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Demo',
                'surname' => 'Demo',
                'patronymic' => 'Demo',
                'email' => 'demo@b.com',
                'password' => bcrypt('demo'),
                'phone' => '0',
                'passport' => '0',
                'company_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Demo 2',
                'surname' => 'Demo 2',
                'patronymic' => 'Demo 2',
                'email' => 'demo2@b.com',
                'password' => bcrypt('demo'),
                'phone' => '0',
                'passport' => '0',
                'company_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        for ($i = 4; $i < 50; $i++){
            array_push($users, [
                'name' => 'User ' . $i,
                'surname' => 'Surname' . $i,
                'patronymic' => 'Patronymic' . $i,
                'email' => 'mail' . $i . '@b.com',
                'password' => bcrypt('user'),
                'phone' => $i,
                'passport' => $i,
                'company_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        DB::table('users')->insert($users);

        $this->enableForeignKeys();
    }
}
