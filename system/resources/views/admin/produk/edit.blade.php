@extends('template.base')

@section('content')

<div class="container">
		<div class="row mt-5">
				<div class="col-md-3">
					<div class="card">
						<div class="card-body">
							<img src="{{url('public/'.$produk->foto)}}" alt="" class="img-fluid">
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card">
				<div class="card-header">
					Ubah Data Produk
				</div>
				<div class="card-body">
					<form action="{{url('admin/produk', $produk->id)}}" method="post" enctype="multipart/form-data">	
						@csrf
						@method("PUT")
						<div class="form-group">
							<label for="brand" class="control-label">Brand Produk</label>
							<input type="text" name="brand" id="brand" class="form-control" value="{{$produk->brand}}">
						</div>
						<div class="form-group">
							<label for="nama" class="control-label">Nama Produk</label>
							<input type="text" name="nama" id="nama" class="form-control" value="{{$produk->nama}}">
						</div>
						<div class="row">
						    <div class="col">
						    	<label for="" class="control-label">Foto</label>
						      <input type="file" class="form-control" name="foto" accept=".png">
						    </div>
						    </div>
						<div class="row">
						    <div class="col">
						    	<label for="harga" class="control-label">Harga Produk</label>
						      <input type="text" class="form-control" name="harga" id="harga" value="{{$produk->harga}}">
						    </div>
						    <div class="col">
						    	<label for="stok" class="control-label">Stok Produk</label>
						      <input type="text" class="form-control" name="stok" id="stok" value="{{$produk->stok}}">
						    </div>
						</div>
						<div class="form-group mt-3">
						    <label for="exampleFormControlSelect1">Kategori Produk</label>
						    <select class="form-control" id="exampleFormControlSelect1" name="id_kategori">
						      <option selected="" value="{{$produk->kategori->id}}">{{$produk->kategori->nama}}</option>
						      <option value="1">Laptop <sup class="text-danger">*1</sup></option>
						      <option value="2">Handphone <sup class="text-danger">*2</sup></option>
						      <option value="3">Pakaian Pria <sup class="text-danger">*3</sup></option>
						      <option value="4">Pakaian Wanita <sup class="text-danger">*4</sup></option>
						    </select>
						</div>
						<div class="form-group">
							<label for="deskripsi" class="control-label">Deskripsi Produk</label>
							<textarea class="form-control" name="deskripsi" id="deskripsi" rows="5" >{{$produk->deskripsi}}</textarea>
						</div>
						<button class="btn btn-success btn-sm"><i class="fa fa-save"></i> Update Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection