<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => "Suci Silvia",
            'username' => "Suci_silvia13",
            'email' => "sucisilvia13199@gmail.com",
            'password' => bcrypt('123'),
            'is_admin' => "1",
            'role' => "admin"

        ]);

        User::create([
            'name' => "umi",
            'username' => "umi",
            'email' => "umikalsum@gmail.com",
            'ewarung' => "ewarung-umi",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "marno",
            'username' => "marno",
            'email' => "marno@gmail.com",
            'ewarung' => "ewarung-marno",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "clara",
            'username' => "clara",
            'email' => "clara@gmail.com",
            'ewarung' => "ewarung-clara",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Ratna Dewi",
            'username' => "ratna",
            'email' => "ratna@gmail.com",
            'ewarung' => "ewarung-ratna",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Arifai",
            'username' => "arifai",
            'email' => "arifai@gmail.com",
            'ewarung' => "ewarung-arifai",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Ahmad Najib",
            'username' => "ahmad",
            'email' => "ahmadnajib@gmail.com",
            'ewarung' => "ewarung-najib",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Sangkut",
            'username' => "sangkut",
            'email' => "sangkut@gmail.com",
            'ewarung' => "ewarung-sangkut",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);
        
        User::create([
            'name' => "Arsyad",
            'username' => "arsyad",
            'email' => "arsyad@gmail.com",
            'ewarung' => "ewarung-arsyad",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Hamulih",
            'username' => "hamulih",
            'email' => "hamulih@gmail.com",
            'ewarung' => "ewarung-hamulih",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Ahmad Lakoni",
            'username' => "lakoni",
            'email' => "ahmadlakoni@gmail.com",
            'ewarung' => "ewarung-lakoni",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Ali Husin",
            'username' => "ali",
            'email' => "alihusin@gmail.com",
            'ewarung' => "ewarung-ali",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Diman Hamid",
            'username' => "Diman",
            'email' => "diman@gmail.com",
            'ewarung' => "ewarung-diman",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Ali Imron",
            'username' => "imron",
            'email' => "aliimron@gmail.com",
            'ewarung' => "ewarung-aliimron",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Nyimbang",
            'username' => "nyimbang",
            'email' => "nyimbang@gmail.com",
            'ewarung' => "ewarung-nyimbang",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Nurhayati",
            'username' => "nurhayati",
            'email' => "nurhayati@gmail.com",
            'ewarung' => "ewarung-nurhayati",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Darmawan",
            'username' => "darmawan",
            'email' => "darmawan@gmail.com",
            'ewarung' => "ewarung-darmawan",
            'password' => bcrypt('123'),
            'role' => "ewarung"


        ]);

        User::create([
            'name' => "Rosyada",
            'username' => "rosyada",
            'email' => "rosyada@gmail.com",
            'ewarung' => "ewarung-rosyada",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Leni Maryani",
            'username' => "leni",
            'email' => "lenimaryani@gmail.com",
            'ewarung' => "ewarung-leni",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Ummi Attiah",
            'username' => "ummi",
            'email' => "ummi@gmail.com",
            'ewarung' => "ewarung-ummi",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Bunyamin",
            'username' => "bunyamin",
            'email' => "bunyamin@gmail.com",
            'ewarung' => "ewarung-bunyamin",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Solmawaty",
            'username' => "solmawaty",
            'email' => "solmawaty@gmail.com",
            'ewarung' => "ewarung-solmawaty",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Nursiwan",
            'username' => "nursiwan",
            'email' => "nursiwan@gmail.com",
            'ewarung' => "ewarung-nursiwan",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Ahmad Yani",
            'username' => "ahmadyani",
            'email' => "ahmadyani@gmail.com",
            'ewarung' => "ewarung-ahmadyani",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Johan Pranata",
            'username' => "johan",
            'email' => "johanpranata@gmail.com",
            'ewarung' => "ewarung-johan",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Agus Salim",
            'username' => "agussalim",
            'email' => "agussalim@gmail.com",
            'ewarung' => "ewarung-agus",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Edi Hendra",
            'username' => "edi",
            'email' => "edihendra@gmail.com",
            'ewarung' => "ewarung-edi",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Mushaidari",
            'username' => "mushadiari",
            'email' => "mushadiari@gmail.com",
            'ewarung' => "ewarung-mushadiari",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);

        User::create([
            'name' => "Dwi Happilia",
            'username' => "dwi",
            'email' => "dwi@gmail.com",
            'ewarung' => "ewarung-dwi",
            'password' => bcrypt('123'),
            'role' => "ewarung"

        ]);
        // User::factory(3)->create();

        Category::create([
            'name' => "Kategori A",
            'slug' => "kategori_a"

        ]);

        Category::create([
            'name' => "Kategori B",
            'slug' => "kategori_b"

        ]);


        // Post::factory(20)->create();

        
    }
}
