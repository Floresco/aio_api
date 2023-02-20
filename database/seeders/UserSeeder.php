<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\v1\Admin\users\User as AdminUser;
use App\Models\v1\Client\users\User as ClientUser;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin_email = 'super.admin@project.com';
        $admin_email = 'admin@project.com';
        $user_email = 'user@project.com';

        $check_super_admin_user = User::where('email', '=', $super_admin_email)->count();
        $check_admin_user = User::where('email', '=', $super_admin_email)->count();
        $check_user = ClientUser::where('email', '=', $user_email)->count();

        if ($check_super_admin_user == 0) {
            $user = User::create([
                'phone' => '11223344',
                'email' => $super_admin_email,
                'password' => \Hash::make('Azerty123'),
                'is_admin' => 1,
                'is_customer' => 0,
            ]);
            \Bouncer::assign('superadmin')->to($user);
        }

        if ($check_admin_user == 0) {
            $user = AdminUser::create([
                'phone' => '22334455',
                'email' => $admin_email,
                'password' => \Hash::make('Azerty123')
            ]);
            \Bouncer::assign('admin')->to($user);
        }

        if ($check_user == 0) {
            $user = ClientUser::create([
                'phone' => '33445566',
                'email' => $user_email,
                'password' => \Hash::make('Azerty123')
            ]);
            \Bouncer::assign('user')->to($user);
        }

    }
}
