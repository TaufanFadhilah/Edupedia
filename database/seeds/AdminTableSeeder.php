<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        Admin::create([
          'name' => 'Admin',
          'email' => 'admin@edupedia.id',
          'password' => bcrypt('qwe123')
        ]);
    }
}
