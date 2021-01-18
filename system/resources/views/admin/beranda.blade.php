@extends('template.base')

@section('content')
<div class="jumbotron">
  <h1 class="display-4">Selamat datang 
  	@if(Auth::user()->level == 1)
  	{{request()->user()->nama}} sebagai Administrator
  	@elseif(Auth::user()->level == 2)
  	{{request()->user()->nama}} sebagai Penjual
  	@else
  	di toko kami. Anda belum login harap login terlebih dahulu
  	@endif
  </h1>
  <p class="lead">Di toko kami terdapat banyak promo dan diskon loh, buruan jangan sampai ketinggalan. Selamat berbelanja ya.</p>
  <hr class="my-4">
  <p>Toko kami sudah dipercayai di indonesia dan aman dalam transaksi.</p>
  <a class="btn btn-primary btn-lg" href="{{url('admin/produk')}}" role="button">Mulai Belanja</a>
</div>

@endsection