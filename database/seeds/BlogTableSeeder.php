<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog = array(
            array(
                'title' => 'This is the title of blog one',
                'description' => 'This is the discription of blog one',
                'status' => 'inactive',
                'is_featured' => '1',
                'added_by' => '1',
                'meta-title' => 'meta,title,metatitle,titlemeta',
                'summary' => 'this is the summary',
                'cat_id' => '1'
            )
        );
        \DB::table('blogs')->insert($blog);
    }
}
