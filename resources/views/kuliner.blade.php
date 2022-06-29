@extends('layouts.app')

@section('title', 'Kuliner')

@section('content')
    <section>
        <div class="mb-2">
            <h4 class="text-muted">Kuliner</h4>
        </div>
        <div id="kuliner" class="row">
            @foreach ($kuliner as $makanan)
                <div class="col-md-3 col-6 shadow-sm p-3 rounded">
                    <div class="d-flex justify-content-center align-items-center" style="overflow: hidden; height: 170px;">
                        <img src="{{ asset('storage/foods/' . $makanan->image) }}" class="img-fluid rounded"
                            alt="Makanan Image">
                    </div>
                    <div class="text-center py-3">
                        <p class="m-0">{{ $makanan->name }}</p>
                        <small class="text-muted">Rp {{ number_format($makanan->price) }}</small>
                    </div>
                    <div class="btn btn-sm btn-success text-white" style="width: 100%">
                        <i class="mdi mdi-whatsapp"></i>
                        Order Makanan
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
