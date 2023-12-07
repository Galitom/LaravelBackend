<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->save("Tommaso","sdsadass.com");
        $this->save("Paolo","abcedfds.com");
        $this->save("Giovanni","abcedfds2434.com");
        $this->save("Giacomo","abc@123.it");
    }

    public function save($name, $email, $password='test'){
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->save();
    }
}
