<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([
            [
                'name' => 'Голосеевский',
                'city_id' => 1,
            ],
            [
                'name' => 'Дарницкий',
                'city_id' => 1,
            ],
            [
                'name' => 'Деснянкий',
                'city_id' => 1,
            ],
            [
                'name' => 'Днепровский',
                'city_id' => 1,
            ],
            [
                'name' => 'Оболонский',
                'city_id' => 1,
            ],
            [
                'name' => 'Печерский',
                'city_id' => 1,
            ],
            [
                'name' => 'Подольский',
                'city_id' => 1,
            ],
            [
                'name' => 'Святошинский',
                'city_id' => 1,
            ],
            [
                'name' => 'Соломенский',
                'city_id' => 1,
            ],
            [
                'name' => 'Шевченковский',
                'city_id' => 1,
            ],
            [
                'name' => 'Амур-Нижнеднепровский',
                'city_id' => 2,
            ],
            [
                'name' => 'Индустриальный',
                'city_id' => 2,
            ],
            [
                'name' => 'Новокодакский',
                'city_id' => 2,
            ],
            [
                'name' => 'Самарский',
                'city_id' => 2,
            ],
            [
                'name' => 'Соборный',
                'city_id' => 2,
            ],
            [
                'name' => 'Центральный',
                'city_id' => 2,
            ],
            [
                'name' => 'Чечеловский',
                'city_id' => 2,
            ],
            [
                'name' => 'Шевченковский',
                'city_id' => 2,
            ],
            [
                'name' => 'Шевченковский',
                'city_id' => 3,
            ],
            [
                'name' => 'Киевский',
                'city_id' => 3,
            ],
            [
                'name' => 'Слободской',
                'city_id' => 3,
            ],
            [
                'name' => 'Основянский',
                'city_id' => 3,
            ],
            [
                'name' => 'Холодногорский',
                'city_id' => 3,
            ],
            [
                'name' => 'Московский',
                'city_id' => 3,
            ],
            [
                'name' => 'Новобаварский',
                'city_id' => 3,
            ],
            [
                'name' => 'Индустриальный',
                'city_id' => 3,
            ],
            [
                'name' => 'Александровский',
                'city_id' => 4,
            ],
            [
                'name' => 'Заводский',
                'city_id' => 4,
            ],
            [
                'name' => 'Коммунарский',
                'city_id' => 4,
            ],
            [
                'name' => 'Днепровский',
                'city_id' => 4,
            ],
            [
                'name' => 'Вознесеновский',
                'city_id' => 4,
            ],
            [
                'name' => 'Хортицкий',
                'city_id' => 4,
            ],
            [
                'name' => 'Шевченковский',
                'city_id' => 4,
            ],
        ]);
    }
}
