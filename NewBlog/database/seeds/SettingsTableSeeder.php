<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = Settings::create([

            'site_name'=>"Laravel's Blog Site",
            'contact_number'=>'01819-610965',
            'email'=>'waseesarwar@gmail.com',
            'address'=>'Dhaka, Bangladesh',


        ]);
    }
}
