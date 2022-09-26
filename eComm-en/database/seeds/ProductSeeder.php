<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        DB::table('products')->insert([
           [
            'name'=>'Oppo mobile',
            'price'=>'300',
            'category'=>'mobile',
            'description'=>'A smartphone with 8gb ram and much more features',
           'gallery'=>'images/book.jpeg',
           ],
           [
            'name'=>'Panasonic Tv',
            'price'=>'400',
            'category'=>'tv',
            'description'=>'A smart tv with 4gb ram and much more features',
           'gallery'=>'images/heart.jpeg',
           ],
           [
            'name'=>'Soni tv',
            'price'=>'500',
            'category'=>'tv',
            'description'=>'A tv with 4gb ram and much more features',
           'gallery'=>'images/pound.jpeg',
           ],
           [
            'name'=>'Soni Fridge',
            'price'=>'200',
            'category'=>'fridge',
            'description'=>'A fridge with much more features',
           'gallery'=>'images/round.jpeg',
           ]
        ]);
    }
}
