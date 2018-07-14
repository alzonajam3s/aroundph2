<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batanes = new Category();
        $batanes->name = 'batanes';
        $batanes->slug = 'batanes';
        $batanes->save();

        $ilocos = new Category();
        $ilocos->name = 'ilocos';
        $ilocos->slug = 'ilocos';
        $ilocos->save();

        $aklan = new Category();
        $aklan->name = 'aklan';
        $aklan->slug = 'aklan';
        $aklan->save();
    }
}
