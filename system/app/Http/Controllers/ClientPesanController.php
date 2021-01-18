<?php 

namespace App\Http\Controllers;

use Auth;
use App\Models\Produk;
use App\Models\User;
use App\Models\ClientProduk;
use App\Models\ClientPesan;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use Illuminate\Support\Arr;
/**
 * 
 */
class ClientPesanController extends Controller
{
	

	function pesan(ClientProduk $produk)
	{
		$user = Auth::user()->id;
		$keranjang = ClientProduk::where('id_user', $user)->get();
		$jumlah = ClientProduk::where('id_user', $user)->sum('subtotal')->get();

		
		$user = Auth::user()->id;
		$data['produk'] = $produk;
		$pesan = new ClientPesan;

		foreach ($keranjang as $key => $value) {
			$data->id_user = request('id_user')[$key];
			$data->id_produk = request('id_produk')[$key];
			$data->jumlah = request('jumlah')[$key];
			$data->subtotal = request('subtotal')[$key];
			$data->jumlah = $jumlah[$key];

			$pesan->save();
		};

		// $hapus = ClientProduk::where('id_user', $user)->get();
		// // $hapus->delete();
		// var_dump($hapus);
		// return redirect('/pembayaran')->with('success', 'Barang Berhasil di Chekout. Silahkan lakukan pembayaran');
		
		// $data = request()->all();

		// $finalArray = array();
		// foreach($data as $key=>$value){
		//    array_push($finalArray, array(
		//                 'id_user'=>$value['id_user'],
		//                 'id_produk'=>$value['id_produk'],
		//                 'jumlah'=>$value['jumlah'],
		//                 'subtotal'=>$value['subtotal'],
		//                 'total'=>$value$jumlah )
		//    );
		// });

		// $input = $request->except('_method', '_token');

		// foreach ($input as $key => $value) {
		// 	$pesan = new ClientPesan;

		// 	$pesan->id_user = $key;
		// 	$pesan->id_produk = $key;
		// 	$pesan->jumlah = $key;
		// 	$pesan->total = $jumlah$key;

		// 	dd($pesan);
		// };
		

}

}