<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([

            'name'=>'Wasee Sarwar',
            'email'=>'waseesarwar187@gmail.com',
            'password'=>bcrypt('123456'),
            'admin'=>1
        ]);
        Profile::create([

            'user_id' => $user->id,
            'avatar' => 'Uploads/avatar/1.jpg',
            'about' =>'This is the one and only admin of this site',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'

        ]);
    }
}
