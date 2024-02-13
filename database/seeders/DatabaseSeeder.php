<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;
use App\models\Service;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'nama' => 'owner',
            'username' => 'owner',
            'password' => bcrypt('owner'),
            'role' => 'owner',
        ]);
        User::create([
            'nama' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        User::create([
            'nama' => 'montir',
            'username' => 'montir',
            'password' => bcrypt('montir'),
            'role' => 'montir',
        ]);
        User::create([
            'nama' => 'kasir',
            'username' => 'kasir',
            'password' => bcrypt('kasir'),
            'role' => 'kasir',
        ]);

        Service::create([
            'nama' => 'Ganti Ban Dalem Express 250/275 -17',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/bandalem.jpeg',
            'harga' => 25000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Luar Battlax',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/banluar.jpeg',
            'harga' => 625000,
            'harga_jasa' => 20000
        ]);
        Service::create([
            'nama' => 'Ganti Oli Gardan Pertamina Enduro',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/oli.jpeg',
            'harga' => 30000,
            'harga_jasa' => 20000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Dalem SWALLOW 275/300 – 14',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/bandalem.jpeg',
            'harga' => 35000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Luar IRC',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/banluar.jpeg',
            'harga' => 135000,
            'harga_jasa' => 20000
        ]);
        Service::create([
            'nama' => 'Ganti Oli Mesin Federal Oil',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/oli.jpeg',
            'harga' => 50000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Dalem Aspira 300/325 R14',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/bandalem.jpeg',
            'harga' => 33000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Luar Michelin',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/banluar.jpeg',
            'harga' => 246000,
            'harga_jasa' => 20000
        ]);
        Service::create([
            'nama' => 'Ganti Oli Mesin AHM',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/oli.jpeg',
            'harga' => 40000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Dalem Aspira 275/300 R14',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/bandalem.jpeg',
            'harga' => 30000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Luar dunlop',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/banluar.jpeg',
            'harga' => 157000,
            'harga_jasa' => 20000
        ]);
        Service::create([
            'nama' => 'Ganti Oli gardan Shell Advance ',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/oli.jpeg',
            'harga' => 35000,
            'harga_jasa' => 15000
        ]);
    }
}
