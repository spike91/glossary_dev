<?php

use Illuminate\Database\Seeder;

class DescriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('descriptions')->insert([
            'english'=> 'A special purpose buffer storage, smaller and faster than main storage, used to hold a copy of instructions and data obtained from main storage and likely to be needed next by the processor',
            'estonian'=> 'Eriotstarbeline puhvermälu, mis on põhimälust väiksem ja kiirem ning milles hoitakse põhimälust võetud ja protsessorile tõenäoliselt järgmistena vajalike käskude ja andmete koopiat',
            'russian'=> 'Хранилище специального назначения, меньше и быстрее, чем основное хранилище, используется для хранения копии инструкций и данных, полученных из основного хранилища и, вероятно, следующего для процессора',
            'image'=>'',
            'word_fk'=>1,
            'category_fk'=>1
            ]);
    }
}
