<?php

use Illuminate\Database\Seeder;

class Select2ableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('select2able')->delete();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $select2able = new \App\Entities\Select2able();
            $select2able->title = $faker->title;
            $select2able->save();
        }
    }
}
