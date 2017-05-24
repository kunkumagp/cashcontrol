<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
            'id'=>'1',
            'created_at'=>'2017-05-23 08:21:19',
            'updated_at'=>'2017-05-23 08:21:19',
            'name'=>'Kunkuma Geeth',
            'email'=>'kunkumagp@gmail.com',
            'password'=>'$2y$10$nN9tifXHOFl3Ypk/hRJyXOXixbU9wOP5HA3wqw2pn4F182Kha6dNO'
        ]);
        $user->save();
    }
}
