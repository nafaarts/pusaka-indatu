@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <article>
                <header class="mb-4">
                    <h1 class="fw-bolder mb-1">{{ $blog->title }}</h1>
                    <div class="text-muted fst-italic mb-2">di posting {{ $blog->created_at->diffForHumans() }} oleh
                        {{ $blog->author->name }}</div>
                    <a class="badge bg-secondary text-decoration-none link-light text-uppercase"
                        href="#!">{{ $blog->category }}</a>
                </header>
                <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('storage/blogs/' . $blog->image) }}"
                        alt="..." /></figure>
                <section class="mb-5">
                    {!! $blog->content !!}
                    @if ($blog->product())
                        <hr>
                        <small><i>Produk tekait : </i></small>
                        <div class="card p-3 mt-2" style="max-width: fit-content">
                            <div class="d-flex">
                                <img height="100" class="rounded"
                                    src="{{ asset('storage/products/' . $blog->product->image) }}" alt="Gambar Produk">
                                <div class="ms-3 d-flex" style="flex-direction: column">
                                    <h6><strong>{{ $blog->product->name }}</strong></h6>
                                    <small>{{ $blog->product->weight }} gram x {{ $blog->product->pcs }} | Rp.
                                        {{ number_format($blog->product->price) }}</small>
                                    <a class="btn btn-sm btn-warning text-white mt-4">Lihat Produk</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </section>
            </article>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header bg-white">Cari Artikel</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Cari artikel..."
                            aria-label="Cari artikel..." aria-describedby="button-search" />
                        <button class="btn btn-warning text-white" id="button-search" type="button">Cari</button>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header bg-white">Artikel Terbaru</div>
                <div class="card-body">
                    @foreach ($other_blogs as $item)
                        <a href="{{ route('artikel.baca', $item) }}" class="media d-flex text-dark"
                            style="gap: 10px; cursor: pointer">
                            <div class="card overflow-hidden"
                                style="width: 300px; background-image: url({{ asset('storage/blogs/' . $item->image) }});background-size: cover; background-position: center center;">
                            </div>
                            <div class="media-body">
                                <h6 class="mt-0 mb-1"><strong>{{ $item->title }}</strong></h6>
                                <small>{{ $item->headline }}</small>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
