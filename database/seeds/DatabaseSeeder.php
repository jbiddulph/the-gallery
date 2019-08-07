<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Category;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Category::truncate();
        Role::truncate();
        // $this->call(UsersTableSeeder::class);
        $adminRole = Role::Create(['name'=>'admin']);
        $admin = User::Create([
            'name'=> 'admin',
            'email'=> 'admin@gmail.com',
            'password'=> bcrypt('password123'),
            'email_verified_at'=>NOW()
        ]);

        $admin->roles()->attach($adminRole);
    }
}
