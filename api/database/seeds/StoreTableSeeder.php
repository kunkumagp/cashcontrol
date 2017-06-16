<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'id' => '1',
            'title' => 'Bank',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        DB::table('stores')->insert([
            'id' => '2',
            'title' => 'Wallet',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        DB::table('stores')->insert([
            'id' => '3',
            'title' => 'Locker (Home)',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);
        DB::table('stores')->insert([
            'id' => '4',
            'title' => 'Locker (Bank)',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s")
        ]);
    }
}
