<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     DB::table('categories')->insert([
        'id' => '1',
        'name'=> 'X-box',
        'description' => 'beschrijving van category',
        'image' => 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fsm.ign.com%2Ft%2Fign_nl%2Fcover%2Fx%2Fxbox-one%2Fxbox-one_764c.1200.jpg&imgrefurl=https%3A%2F%2Fnl.ign.com%2Fxbox-one-gaming-hardware&tbnid=0BdP1WSQ5XcfJM&vet=12ahUKEwi6qan4qdb8AhVMybsIHSDeDiUQMygXegUIARD5Ag..i&docid=nBWZy0PktwbwPM&w=1200&h=1200&q=x-box&ved=2ahUKEwi6qan4qdb8AhVMybsIHSDeDiUQMygXegUIARD5Ag',
    ]);
    }
}
