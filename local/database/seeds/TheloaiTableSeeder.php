<?php

use Illuminate\Database\Seeder;

class TheloaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
    		'name' => 'Đồ thị',
    		'name_without_accent' => 'do-thi',
    		'idUser' => 1
        ]);
    }
}
