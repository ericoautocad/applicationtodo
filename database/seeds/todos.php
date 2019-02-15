<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class todos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ["uuid" => uniqid(), "type" => "shopping", "content" => "todo 1", "sort_order" => 0, "done" => 0],
            ["uuid" => uniqid(), "type" => "shopping", "content" => "todo 2", "sort_order" => 1, "done" => 1]
        ];

        Db::table('todos')->insert($data);
    }
}
