<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use LogicException;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $name = config('admin.name');
        $email = config('admin.email');
        $password = config('admin.password');

        if (! $name || ! $email || ! $password) {
            throw new LogicException('Set ADMIN_NAME, ADMIN_EMAIL, and ADMIN_PASSWORD before creating the admin account.');
        }

        $admin = User::firstOrNew(['email' => $email]);
        $admin->name = $name;
        $admin->password = $password;
        $admin->is_admin = true;
        $admin->save();
    }
}
