<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert(
            [
                ['name' => '消化器'],
                ['name' => '循環器'],
                ['name' => '内分泌'],
                ['name' => '腎臓'],
                ['name' => '血液'],
                ['name' => '感染症'],
                ['name' => '呼吸器'],
                ['name' => '神経'],
                ['name' => '救急'],
                ['name' => '麻酔'],
                ['name' => '総論'],
                ['name' => '小児科'],
                ['name' => '産婦人科'],
                ['name' => '眼科'],
                ['name' => '耳鼻咽喉科'],
                ['name' => '整形外科'],
                ['name' => '精神科'],
                ['name' => '皮膚科'],
                ['name' => '泌尿器科'],
                ['name' => '放射線科'],
                ['name' => '公衆衛生'],
                ['name' => '腫瘍学'],
            ]
        );
    }
}
