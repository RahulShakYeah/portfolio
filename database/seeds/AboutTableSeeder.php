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
        $description = 'As an individual currently pursuing Bachelor in Information Management who had developed a
        mature and responsible approach to take any task I undertake or situation that I am presented with. Has basic web development
        and management skills and can work effectively alone or as part of the team.I have sociable personality with a friendly approach.';

        if (\App\About::count() <= 0) {
            $about = new \App\About();
            $about->description = $description;
            $about->save();
        }
    }
}
