<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where('email', 'email@admin.com')->first()) {
            User::create([
                'name' => "Admin",
                'email' => "email@admin.com",
                'password' => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
            ]);
        }
        factory(User::class, 50)->create();
    }
}
