<?php

use Illuminate\Database\Seeder;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => '1',
            'title' => 'Salary',
            'type' => 'income',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'status' => 'active'
        ]);
        DB::table('categories')->insert([
            'id' => '2',
            'title' => 'Freelance Work',
            'type' => 'income',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'status' => 'active'
        ]);
        DB::table('categories')->insert([
            'id' => '3',
            'title' => 'Music Band',
            'type' => 'income',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'status' => 'active'
        ]);
        DB::table('categories')->insert([
            'id' => '4',
            'title' => 'Music Comporsing',
            'type' => 'income',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'status' => 'active'
        ]);
        DB::table('categories')->insert([
            'id' => '5',
            'title' => 'Transport',
            'type' => 'expenses',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'status' => 'active'
        ]);
        DB::table('categories')->insert([
            'id' => '6',
            'title' => 'Home',
            'type' => 'Personal',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'status' => 'active'
        ]);
        DB::table('categories')->insert([
            'id' => '7',
            'title' => 'Personal',
            'type' => 'expenses',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'status' => 'active'
        ]);
        DB::table('categories')->insert([
            'id' => '8',
            'title' => 'Electricity',
            'type' => 'bill',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'status' => 'active'
        ]);
        DB::table('categories')->insert([
            'id' => '9',
            'title' => 'Credit Card',
            'type' => 'bill',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'status' => 'active'
        ]);
        DB::table('categories')->insert([
            'id' => '10',
            'title' => 'Telephone',
            'type' => 'bill',
            'created_at' => date("Y-m-d H:m:s"),
            'updated_at' => date("Y-m-d H:m:s"),
            'status' => 'active'
        ]);
    }
}
