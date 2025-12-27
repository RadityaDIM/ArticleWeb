<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(["name" => "Programmer"]);
        Role::create(["name" => "Programmer Web"]);
        Role::create(["name" => "Teknisi Jaringan"]);
        Role::create(["name" => "Pengusaha"]);
        Role::create(["name" => "Android Developer"]);
        Role::create(["name" => "Wordpress Developer"]);
    }
}
