<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use Illuminate\Http\Request;

class AlamatResource extends Controller
{
	
	function getKabupaten($id_provinsi){
		return Kabupaten::where('id_provinsi', $id_provinsi)->get()->toJson();
	}

	function getKecamatan($id_kabupaten){
		return Kecamatan::where('id_kabupaten', $id_kabupaten)->get()->toJson();
	}
	
	function getDesa($id_kecamatan){
		return Desa::where('id_kecamatan', $id_kecamatan)->get()->toJson();
	}

}
