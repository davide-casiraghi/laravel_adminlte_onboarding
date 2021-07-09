<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => '1', 'name' => 'Admin', 'email' => 'admin@admin.com'],
        ];

        foreach ($users as $key => $user) {
            User::factory()->create($user);
        }
    }
}
