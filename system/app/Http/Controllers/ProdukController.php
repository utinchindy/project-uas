<?php 


namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;


/**
 * 
 */
class ProdukController extends Controller
{
	
	function index()
	{
		$user = request()->user();
		$data['list_produk'] = $user->produk;
		return view('admin/produk/index', $data);
	}
	
	function create()
	{
		return view('admin/produk/create');
	}
	
	function store()
	{
		
		$produk = new Produk;
		$produk->id_user = request()->user()->id;
		$produk->brand = request('brand');
		$produk->nama = request('nama');
		$produk->handleUploadFoto();
		$produk->harga = request('harga');
		$produk->stok = request('stok');
		$produk->id_kategori = request('id_kategori');
		$produk->deskripsi = request('deskripsi');
		$produk->save();

		return redirect('admin/produk')->with('success', 'Data Berhasil di Tambahkan');
	}
	
	function show(Produk $produk)
	{
		$data['produk'] = $produk;
		return view('admin/produk/show', $data);
	}
	
	function edit(Produk $produk)
	{
		$data['produk'] = $produk;
		return view('admin/produk/edit', $data);
		
	}
	
	function update(Produk $produk)
	{
		$produk->brand = request('brand');
		$produk->nama = request('nama');
		$produk->harga = request('harga');
		$produk->stok = request('stok');
		$produk->id_kategori = request('id_kategori');
		$produk->deskripsi = request('deskripsi');
		$produk->save();

		$produk->handleUploadFoto();

		return redirect('admin/produk')->with('success', 'Data Berhasil di Update');
	}
	
	function destroy(Produk $produk)
	{
		$produk->handlDelete();
		$produk->delete();

		return redirect('admin/produk')->with('danger', 'Data Berhasil di Hapus');
	}
	function filter(){
		$nama = request('nama');
		$stok = explode(",", request('stok'));
		$data['harga_min'] = $harga_min = request('harga_min');
		$data['harga_max'] = $harga_max = request('harga_max');
		$data['list_produk'] = Produk::where('nama','like', "%$nama%")->get();
		$data['list_produk'] = Produk::whereIn('stok', $stok)->get();
		$data['list_produk'] = Produk::whereNotIn('stok', [0])->whereBetween('harga', [$harga_min, $harga_max])->where('nama','like', "%$nama%")->get();
		$data['nama'] = $nama;
		$data['stok'] = request('stok');
		

		return view('admin/produk/index', $data);	
	}
	
	public function testCollection(){

		$list_bike = ['Honda', 'Yamaha', 'Kawasaki', 'Suzuki', 'Vespa','BMW', 'KTM'];
		$list_bike = collect($list_bike);
		$list_produk = Produk::all();
		// Sorting
		// Sort By Harga Terendah
		//dd($list_produk->sortBy('harga'));
		// Sort By Harga Tertinggi
		//dd($list_produk->sortByDesc('harga'));
		

		// Filter

		//$filtered = $list_produk->filter(function($item){
			//return $item->harga < 200000;
		//});
		//dd($filtered);

		//$sum = $list_produk->sum('stok');
		//dd($sum);

		$data['list'] = Produk::Paginate(4);
		return view('test-collection', $data);


		
		dd($list_bike, $collection, $list_produk);
	}


}