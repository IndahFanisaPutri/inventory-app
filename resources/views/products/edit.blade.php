@extends('layouts.main')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <!-- Card -->
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <!-- Header -->
                <div class="card-header bg-warning bg-gradient text-dark p-4 border-0">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                        <div>

                            <h2 class="fw-bold mb-1">
                                Edit Produk
                            </h2>

                            <p class="mb-0 opacity-75">
                                Perbarui data produk inventaris
                            </p>

                        </div>

                        <!-- Badge -->
                        <span class="badge bg-dark text-white px-3 py-2 rounded-pill">
                            ID Produk: #{{ $product->id }}
                        </span>

                    </div>

                </div>

                <!-- Body -->
                <div class="card-body p-5">

                    <form action="{{ route('products.update', $product->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <!-- Nama Produk -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold text-dark">
                                Nama Produk
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light border-0">
                                    <i class="bi bi-box-seam"></i>
                                </span>

                                <input 
                                    type="text"
                                    name="name"
                                    class="form-control form-control-lg border-0 bg-light"
                                    value="{{ $product->name }}"
                                    placeholder="Masukkan nama produk"
                                    required
                                >

                            </div>

                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold text-dark">
                                Kategori
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light border-0">
                                    <i class="bi bi-tags"></i>
                                </span>

                                <select 
                                    name="category_id"
                                    class="form-select form-select-lg border-0 bg-light"
                                    required
                                >

                                    <option value="">
                                        -- Pilih Kategori --
                                    </option>

                                    @foreach($categories as $category)

                                        <option 
                                            value="{{ $category->id }}"
                                            {{ $product->category_id == $category->id ? 'selected' : '' }}
                                        >
                                            {{ $category->name }}
                                        </option>

                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <!-- Harga & Stok -->
                        <div class="row">

                            <!-- Harga -->
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold text-dark">
                                    Harga
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-light border-0">
                                        Rp
                                    </span>

                                    <input 
                                        type="number"
                                        name="price"
                                        class="form-control form-control-lg border-0 bg-light"
                                        value="{{ $product->price }}"
                                        placeholder="Masukkan harga"
                                        required
                                    >

                                </div>

                            </div>

                            <!-- Stok -->
                            <div class="col-md-6 mb-4">

                                <label class="form-label fw-semibold text-dark">
                                    Stok
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text bg-light border-0">
                                        <i class="bi bi-archive"></i>
                                    </span>

                                    <input 
                                        type="number"
                                        name="stock"
                                        class="form-control form-control-lg border-0 bg-light"
                                        value="{{ $product->stock }}"
                                        placeholder="Masukkan stok"
                                        required
                                    >

                                </div>

                            </div>

                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold text-dark">
                                Deskripsi
                            </label>

                            <textarea 
                                name="description"
                                rows="5"
                                class="form-control border-0 bg-light"
                                placeholder="Masukkan deskripsi produk..."
                            >{{ $product->description }}</textarea>

                        </div>

                        <!-- Status -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold text-dark">
                                Status Produk
                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-light border-0">
                                    <i class="bi bi-check-circle"></i>
                                </span>

                                <select 
                                    name="status"
                                    class="form-select form-select-lg border-0 bg-light"
                                    required
                                >

                                    <option value="tersedia"
                                        {{ $product->status == 'tersedia' ? 'selected' : '' }}>
                                        Tersedia
                                    </option>

                                    <option value="habis"
                                        {{ $product->status == 'habis' ? 'selected' : '' }}>
                                        Habis
                                    </option>

                                </select>

                            </div>

                        </div>

                        <!-- Info -->
                        <div class="alert alert-warning border-0 rounded-4">

                            <div class="d-flex align-items-center gap-2">

                                <i class="bi bi-exclamation-triangle-fill"></i>

                                <div>

                                    Pastikan data yang diperbarui sudah benar sebelum menekan tombol 
                                    <strong>Update Produk</strong>.

                                </div>

                            </div>

                        </div>

                        <!-- Button -->
                        <div class="d-flex justify-content-end gap-3 mt-4 flex-wrap">

                            <!-- Back -->
                            <a href="{{ route('products.index') }}" 
                               class="btn btn-outline-secondary btn-lg rounded-4 px-4">

                                <i class="bi bi-arrow-left me-2"></i>
                                Kembali

                            </a>

                            <!-- Update -->
                            <button type="submit" 
                                    class="btn btn-warning btn-lg rounded-4 px-4 shadow-sm">

                                <i class="bi bi-pencil-square me-2"></i>
                                Update Produk

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection