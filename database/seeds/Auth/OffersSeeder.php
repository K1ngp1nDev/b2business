<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OffersSeeder extends Seeder
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
        $this->truncate('offers');

        $offers = [
            [
                'name' => 'Offer 1',
                'excerpt' => 'Технічний об\'єкт, який лал зщкл щзл упзк',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 1,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => 1,
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 2',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde, hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 1,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => 1,
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 3',
                'excerpt' => 'Раніше вважалося, що ставкова жаба є
                                    підвидом жаби їстівної Р. esculentus (Р. esculentus lessonae)',
                'text' => 'Раніше вважалося, що ставкова жаба є
                                    підвидом жаби їстівної Р. esculentus (Р. esculentus lessonae),
                                    і остання трапляється в межах більшої частини України, а Р.
                                    esculentus esculentus живе у пониззі Дунаю та на Закарпатті.',
                'company_id' => 2,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => 1,
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 4',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 2,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 5',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 2,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 6',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 3,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 7',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 3,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 8',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 3,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 9',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 3,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 10',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 3,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 11',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 4,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 12',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 4,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 13',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 4,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 14',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 4,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 15',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 4,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 16',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 4,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 17',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 4,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 18',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 4,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 19',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 4,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 20',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 4,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

            [
                'name' => 'Offer 21',
                'excerpt' => 'Hho ifheid hiehfi swehfji ejfiej ifjeijf eifj eifjeifjde',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => 5,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        for ($i = 22; $i < 50; $i++){
            array_push($offers, [
                'name' => 'Offer ' . $i,
                'excerpt' => 'Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'text' => 'Full Text: Технічний об\'єкт, який складається із взаємопов\'язаних функціональних частин...',
                'company_id' => $i,
                'category_id' => rand(1, 2),
                'main_photo' => 'img/main_banner1.png',
                'photos' => 'paths',
                'price' => $i * 100,
                'views' => rand(0, 100),
                'is_active' => rand(0, 1),
                'creator_id' => $i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        DB::table('offers')->insert($offers);

        $this->enableForeignKeys();
    }
}
