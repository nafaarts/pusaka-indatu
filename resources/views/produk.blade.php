@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <section>
        <div class="mb-2">
            <h4 class="text-muted">Produk</h4>
        </div>
        <div id="produk" class="row">
            @foreach ($products as $product)
                <div class="col-md-3 col-6 shadow-sm p-3 rounded">
                    <div class="d-flex justify-content-center align-items-center" style="overflow: hidden; height: 170px;">
                        <img src="{{ asset('storage/products/' . $product->image) }}" class="img-fluid rounded"
                            alt="Product Image">
                    </div>
                    <div class="text-center py-3">
                        <p class="m-0">{{ $product->name }}</p>
                        <small class="text-muted">Rp {{ number_format($product->price) }}</small>
                    </div>
                    <div class="text-center">
                        <div class="btn btn-sm btn-outline-warning mb-2 w-100"><i class="mdi mdi-cart-outline"></i> Tambah
                            Keranjang
                        </div>
                        <div class="btn btn-sm btn-warning text-white w-100">Beli Sekarang</div>
                    </div>
            @endforeach
        </div>
    </section>
@endsection
