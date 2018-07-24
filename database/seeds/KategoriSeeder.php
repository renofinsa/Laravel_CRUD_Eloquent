<?php

use Illuminate\Database\Seeder;
use App\Kategori;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('kategoris')->delete();

      Kategori::create([
          'kategori' => 'Laravel'
      ]);
      Kategori::create([
          'kategori' => 'PHP'
      ]);
      Kategori::create([
          'kategori' => 'Java'
      ]);
      Kategori::create([
          'kategori' => 'React'
      ]);
    }
}
