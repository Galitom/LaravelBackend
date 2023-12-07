<?php

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->save("Hunger Games", 2010, 1);
        $this->save("Palla Rotonda", 2015, 3);
        $this->save("Io e Te", 1998, 2);


    }

    public function save($title, $year, $actor_id){
        $movie = new \App\Movie();
        $movie->actor_id = $actor_id;
        $movie->title = $title;
        $movie->year = $year;
        $movie->save();
    }
}
