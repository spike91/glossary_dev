<?php

use Illuminate\Database\Seeder;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('words')->insert([
            'english'=> 'Cachememory',
            'estonian'=> 'Vahemälu',
            'russian'=> 'Кэш-память'
            ]);
    }
}
