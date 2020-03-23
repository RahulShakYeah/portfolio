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
        $category = array(
            array(
                'name' => 'Entertainment',
                'summary' => 'entertainment',
                'status' => 'inactive',
                'added_by' => 2
            ),
            array(
                'name' => 'Politics',
                'summary' => 'Politics',
                'status' => 'inactive',
                'added_by' => 2
            ),array(
                'name' => 'International',
                'summary' => 'International',
                'status' => 'inactive',
                'added_by' => 2
            ),
        );
        foreach($category as $cat_list){
            if(\App\Category::where('name',$cat_list['name'])->count() <=0 ){
                $cat = new \App\Category();
                $cat->fill($cat_list);
                $cat->save();
            }
        }
    }
}
