<?php

use Illuminate\Database\Seeder;

class AboutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $description = 'asdasdasdasd';

        if (\App\About::count() <= 0) {
            $about = new \App\About();
            $about->description = $description;
            $about->save();
        }
    }
}
