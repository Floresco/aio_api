<?php

namespace Database\Seeders;

use App\Models\User;
use Bouncer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //create role
        $super_admin = Bouncer::role()->firstOrCreate([
            'name' => 'superadmin',
            'title' => 'Super Admin',
        ]);

        $admin = Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);

        $user = Bouncer::role()->firstOrCreate([
            'name' => 'user',
            'title' => 'User',
        ]);

        //abilities
        $abilities = [
            [
                'name' => 'dashboard',
                'title' => 'Dashboard',
            ]
        ];

        foreach ($abilities as $ability) {
            Bouncer::ability()->firstOrCreate($ability);
        }

        //assign permission
        Bouncer::allow($super_admin)->everything();
        Bouncer::allow($admin)->everything();
        Bouncer::forbid($admin)->toManage(\App\Models\User::class);

        //Features
        Bouncer::allow($user)->to('dashboard');

    }
}
