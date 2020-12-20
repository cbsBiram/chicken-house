<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            BandSeeder::class,
            AlimentSeeder::class,
            ExtraChargeSeeder::class,
            SaleSeeder::class,
        ]);
        $admin = new User();
        $admin->name = "admin";
        $admin->email = "admin123@gmail.com";
        $admin->password = bcrypt("adminpassword3");
        $admin->email_verified_at = NOW();
        $admin->phone = "034534494";
        $admin->is_admin = 1;
        $admin->save();
    }
}
