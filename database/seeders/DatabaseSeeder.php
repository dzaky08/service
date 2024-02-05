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
            'nama' => 'Ganti Ban Dalem',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/bandalem.jpeg',
            'harga' => 30000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Luar',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/banluar.jpeg',
            'harga' => 40000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Oli',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/oli.jpeg',
            'harga' => 50000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Dalem',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/bandalem.jpeg',
            'harga' => 30000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Luar',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/banluar.jpeg',
            'harga' => 40000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Oli',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/oli.jpeg',
            'harga' => 50000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Dalem',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/bandalem.jpeg',
            'harga' => 30000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Luar',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/banluar.jpeg',
            'harga' => 40000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Oli',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/oli.jpeg',
            'harga' => 50000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Dalem',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/bandalem.jpeg',
            'harga' => 30000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Ban Luar',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/banluar.jpeg',
            'harga' => 40000,
            'harga_jasa' => 10000
        ]);
        Service::create([
            'nama' => 'Ganti Oli',
            'qty' => 100,
            'status' => 'ada',
            'foto' => 'img/oli.jpeg',
            'harga' => 50000,
            'harga_jasa' => 10000
        ]);
    }
}
