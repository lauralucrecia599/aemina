<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {

        factory(App\Productos::class, 50)->create();
        App\User::create(array(
            'name'=>'administradorPPP',
            'email'=>'admins@admin.com',
            'password'=>bcrypt('admin'),
        ));
    }
}
