<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;

class Kabupaten extends Model
{
	protected $table = 'kabupaten';

	function kecamatan(){
		return $this->hasMany(Kecamatan::class,'id_kabupaten');
	}

	function provinsi(){
		return $this->belongsTo(Provinsi::class, 'id_provinsi');
	}
}