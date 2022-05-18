<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['name'] = 'Admin';
        $data['email'] = 'admin@admin.com';
        $data['password'] = bcrypt('123456');
        $data['phone'] = '0123456789';
        Admin::create($data);
    }
}
