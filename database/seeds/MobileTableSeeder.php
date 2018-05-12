<?php

use Illuminate\Database\Seeder;
use App\Mobile;
class MobileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Mobile::class, 5)-> create();
    }
}
