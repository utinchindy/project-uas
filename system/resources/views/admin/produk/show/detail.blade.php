 <hr>
	Kategori : {{$produk->kategori->nama}}
	<p class="lead"><strong class="text-dark">Stok Tersedia <b>{{$produk->stok}}</b> |  {{($produk->harga)}} |
	Seller : {{$produk->seller->nama}} |
	Tanggal Produk : {{$produk->created_at->diffForHumans()}} 
<hr class="my-4">