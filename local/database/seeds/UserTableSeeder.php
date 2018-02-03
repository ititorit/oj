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
        DB::table('posts')->insert([
            'title' => 'fucking wow shits.',
            'name_without_accent' => 'fucking-wow-shits',
            'intro' => 'fhdsjakhfsjkdalfhdsajkf hsdjkaf hdsjakfg dshafgdsahfsdafdsafdsafsdafdsafdsafdsafsa',
            'full' => 'bfdsabfd dshfdsfgkdshafdsafdsahfgdsa shfjska fha sdajfgdskafg sdafghddsasfdafdsafsdafdsafsdafdsafds',
            'idUser' => 1,
            'idCate' => 1,
            'idChuDe' => 1,
        ]);
    }
}
