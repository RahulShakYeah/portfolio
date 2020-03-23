<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(
                'name' => 'Rahul Shakya',
                'email' => 'rahulshakya123rs@gmail.com',
                'password' => bcrypt('9860035972'),
                'role' => 'admin',
                'status' => 'active',
            ),
            array(
                'name' => 'Blogger',
                'email' => 'blogger@blogger.com',
                'password' => bcrypt('blogger123'),
                'role' => 'blogger',
                'status' => 'active',
            ),
            array(
                'name' => 'Random',
                'email' => 'random@blogger.com',
                'password' => bcrypt('random123'),
                'role' => 'blogger',
                'status' => 'active',
            )
        );

        foreach($users as $user_list){
            if(\App\User::where('email',$user_list['email'])->count() <= 0){
                $user = new \App\User();
                $user->fill($user_list);
                $user->save();
            }
        }
    }
}
