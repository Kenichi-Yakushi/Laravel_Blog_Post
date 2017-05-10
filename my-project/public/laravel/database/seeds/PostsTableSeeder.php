<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('posts')->truncate();

        $data = [];
        foreach (range(1, 1000) as $i) {
            $data[] = ['body' => 'body'.$i];
        }
        DB::table('posts')->insert($data);
    }
}
