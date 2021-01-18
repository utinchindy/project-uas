<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create('id_ID');

    	$harga = array(
    		'2000000',
    		'2350000',
    		'4590000',
    		'13000000',
    		'8990000',
    		'6990000',
    		'16990000',
    		'11500000',
    );
    	$nama = array(
    		'Samsung Galaxy A',
    		'Xiaomi Note ',
    		'Infinix Note ',
    		'Asus Thuf Gaming Type ',
    		'Acer Predator Type ' 
    	);

    	for ($i=1; $i <= 50 ; $i++) { 
    		
	    	$produk = new Produk;
			$produk->id_user = 1;
			$produk->brand = $faker->company;
			$produk->nama = $nama[$faker->numberBetween(0,4)].$i;
			$produk->foto = 'app/images/produk/faker.jpg';
			$produk->harga = $harga[$faker->numberBetween(0, 7)];
			$produk->stok = $faker->numberBetween(10,30);
			$produk->id_kategori = 2;
			$produk->deskripsi = $faker->text($maxNbChars = 200);
			$produk->save();
    	}
        
    }
}
