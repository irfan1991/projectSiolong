<?php

use Illuminate\Database\Seeder;
use App\Kategori;
use App\Barang;


class BarangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

  
         $sepatu = Kategori::create(['title' => 'Sepatu']);
        $sepatu->childs()->saveMany([
            new Kategori(['title' => 'Lifestyle']),
            new Kategori(['title' => 'Berlari']),
            new Kategori(['title' => 'Basket']),
            new Kategori(['title' => 'Sepakbola'])
        ]);

        $pakaian = Kategori::create(['title' => 'Pakaian']);
        $pakaian->childs()->saveMany([
            new Kategori(['title' => 'Jaket']),
            new Kategori(['title' => 'Hoodie']),
            new Kategori(['title' => 'Rompi']),
        ]);

        // sample Barang
        $running = Kategori::where('title', 'Berlari')->first();
        $lifestyle = Kategori::where('title', 'Lifestyle')->first();
        $sepatu1 = Barang::create([
            'nama_barang' => 'Nike Air Force',
            'model' => 'Sepatu Pria',
            'photo'=>'stub-shoe.jpg',
            'deskripsi' => 'ini file percobaan',
            'price' => 340000,
            'id_user' => 6]);
        $sepatu2 = Barang::create([
            'nama_barang' => 'Nike Air Max',
            'model' => 'Sepatu Wanita',
            'photo'=>'stub-shoe.jpg',
           'deskripsi' => 'ini file percobaan',
           'price' => 340000,
            'id_user' => 6]);
        $sepatu3 = Barang::create([
            'nama_barang' => 'Nike Air Zoom',
            'model' => 'Sepatu Wanita',
            'photo'=>'stub-shoe.jpg',
            'deskripsi' => 'ini file percobaan',
            'price' => 340000,
            'id_user' => 6]);
        $running->barangs()->saveMany([$sepatu1, $sepatu2, $sepatu3]);
        $lifestyle->barangs()->saveMany([$sepatu1, $sepatu2]);

        $jacket = Kategori::where('title', 'Jaket')->first();
        $vest = Kategori::where('title', 'Rompi')->first();
        $jacket1 = Barang::create([ 
            'nama_barang' => 'Nike Aeroloft Bomber',
            'model' => 'Jaket Wanita',
            'photo'=>'stub-jacket.jpg',
            'deskripsi' => 'ini file percobaan',
            'price' => 780000,
            'id_user' => 6]);
        $jacket2 = Barang::create([
            'nama_barang' => 'Nike Guild 550',
            'model' => 'Jaket Pria',
            'photo'=>'stub-jacket.jpg',
            'deskripsi' => 'ini file percobaan',
            'price' => 340000,
            'id_user' => 6]);
        $jacket3 = Barang::create([
            'nama_barang' => 'Nike SB Steele',
            'model' => 'Jaket Pria',
            'photo'=>'stub-jacket.jpg',
            'deskripsi' => 'ini file percobaan',
            'price' => 340000,
            'id_user' => 6]);
        $jacket->barangs()->saveMany([$jacket1, $jacket3]);
        $vest->barangs()->saveMany([$jacket2, $jacket3]);

        // copy image sample to public folder
        $from = database_path() . DIRECTORY_SEPARATOR . 'seeds' .
            DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR;
        $to = public_path() . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR;
        File::copy($from . 'stub-jacket.jpg', $to . 'stub-jacket.jpg');
        File::copy($from . 'stub-shoe.jpg', $to . 'stub-shoe.jpg');
    }
}
