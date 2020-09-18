<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
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
        $this->truncate('categories');

        $categories = [
            [
                'name' => 'Нерухомість',
                'parent_id' => 1
            ],

            [
                'name' => 'Авто',
                'parent_id' => 2
            ],

            [
                'name' => 'Виробництво',
                'parent_id' => 3
            ],

            [
                'name' => 'Бізнес',
                'parent_id' => 4
            ],

            [
                'name' => 'Земля',
                'parent_id' => 5
            ],

            [
                'name' => 'Продукти харчування',
                'parent_id' => 6
            ],

            [
                'name' => 'Для офісу',
                'parent_id' => 7
            ],

            [
                'name' => 'Програмування',
                'parent_id' => 8
            ],

            [
                'name' => 'Інше',
                'parent_id' => 9
            ],

            [
                'name' => 'Нерухомість підкатегорія 1',
                'parent_id' => 1
            ],

            [
                'name' => 'Нерухомість підкатегорія 2',
                'parent_id' => 1
            ],

            [
                'name' => 'Нерухомість підкатегорія 3',
                'parent_id' => 1
            ],

            [
                'name' => 'BMW',
                'parent_id' => 2
            ],

            [
                'name' => 'Toyota',
                'parent_id' => 2
            ],

            [
                'name' => 'Renault',
                'parent_id' => 2
            ],

            [
                'name' => 'Mercedes',
                'parent_id' => 2
            ],
        ];

        DB::table('categories')->insert($categories);

        $this->enableForeignKeys();
    }
}
