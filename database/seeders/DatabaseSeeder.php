<?php

namespace Database\Seeders;

use App\Models\Kategori;
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

        Kategori::create([
            'nama' => 'oli mesin',
            'foto' => 'img/oli.png'
        ]);
        Kategori::create([
            'nama' => 'oli gardan',
            'foto' => 'img/oli.png'
        ]);
        Kategori::create([
            'nama' => 'ban dalam',
            'foto' => 'img/bandalem.png'
            
        ]);
        Kategori::create([
            'nama' => 'ban luar',
            'foto' => 'img/banluar.png'

        ]);

        Service::create([
            'nama' => 'Express 250/275 -17',
            'qty' => 10,
            'kategori_id' => 3,
            'status' => 'ada',
            'foto' => 'img/bandalem.png',
            'harga' => 25000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Battlax',
            'qty' => 10,
            'kategori_id' => 4,
            'status' => 'ada',
            'foto' => 'img/banluar.png',
            'harga' => 625000,
            'harga_jasa' => 20000
        ]);
        Service::create([
            'kategori_id' => 2,
            'nama' => 'Pertamina Enduro',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/oli.png',
            'harga' => 30000,
            'harga_jasa' => 20000
        ]);
        Service::create([
            'nama' => 'SWALLOW 275/300 – 14',
            'qty' => 10,
            'kategori_id' => 3,
            'status' => 'ada',
            'foto' => 'img/bandalem.png',
            'harga' => 35000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'IRC',
            'qty' => 10,
            'kategori_id' => 4,
            'status' => 'ada',
            'foto' => 'img/banluar.png',
            'harga' => 135000,
            'harga_jasa' => 20000
        ]);
        Service::create([
            'kategori_id' => 1,
            'nama' => 'Federal Oil',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/oli.png',
            'harga' => 50000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Aspira 300/325 R14',
            'qty' => 10,
            'kategori_id' => 3,
            'status' => 'ada',
            'foto' => 'img/bandalem.png',
            'harga' => 33000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Michelin',
            'qty' => 10,
            'kategori_id' => 4,
            'status' => 'ada',
            'foto' => 'img/banluar.png',
            'harga' => 246000,
            'harga_jasa' => 20000
        ]);
        Service::create([
            'kategori_id' => 1,
            'nama' => 'AHM',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/oli.png',
            'harga' => 40000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Aspira 275/300 R14',
            'qty' => 10,
            'kategori_id' => 3,
            'status' => 'ada',
            'foto' => 'img/bandalem.png',
            'harga' => 30000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'dunlop',
            'qty' => 10,
            'kategori_id' => 4,
            'status' => 'ada',
            'foto' => 'img/banluar.png',
            'harga' => 157000,
            'harga_jasa' => 20000
        ]);
        Service::create([
            'kategori_id' => 2,
            'nama' => 'Shell Advance ',
            'qty' => 10,
            'status' => 'ada',
            'foto' => 'img/oli.png',
            'harga' => 35000,
            'harga_jasa' => 15000
        ]);
    }
}
