<?php

use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->save("Giorgio","Naplo",1921);
        $this->save("Lino","Banfi",2003);
        $this->save("GIno","Bianchi",1983);
        $this->save("Bho","bho",2022);
    }

    public function save($name, $surname, $year){
        $actor = new \App\Actor();
        $actor->name = $name;
        $actor->surname = $surname;
        $actor->year = $year;
        $actor->save();
    }
}
