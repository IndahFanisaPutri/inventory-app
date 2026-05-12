@extends('layouts.main')

@section('content')

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>
            <h1 class="fw-bold text-dark mb-1">
                Daftar Barang Inventaris
            </h1>

    
        </div>

        <!-- Button Tambah -->
        <a href="{{ route('products.create') }}" 
           class="btn btn-dark btn-lg rounded-3 shadow-sm px-4">

            <i class="bi bi-plus-circle me-2"></i>
            Tambah Data

        </a>

    </div>

    <!-- Card -->
    <div class="card border-0 shadow rounded-4 overflow-hidden">

        <!-- Card Header -->
        <div class="card-header bg-dark text-white py-3 px-4 border-0">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                <h5 class="mb-0 fw-semibold">
                    Data Produk Inventaris
                </h5>

                <span class="badge bg-secondary px-3 py-2 rounded-pill">
                    Total: {{ $products->total() }} Produk
                </span>

            </div>

        </div>

        <!-- Card Body -->
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <!-- Table Head -->
                    <thead style="background-color: #f8f9fa;">

                        <tr class="text-center">

                            <th class="py-3 text-secondary">No</th>
                            <th class="py-3 text-secondary">Nama Barang</th>
                            <th class="py-3 text-secondary">Kategori</th>
                            <th class="py-3 text-secondary">Harga</th>
                            <th class="py-3 text-secondary">Stok</th>
                            <th class="py-3 text-secondary">Deskripsi</th>
                            <th class="py-3 text-secondary">Status</th>
                            <th class="py-3 text-secondary" width="200">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <!-- Table Body -->
                    <tbody>

                        @forelse($products as $index => $p)

                        <tr>

                            <!-- No -->
                            <td class="text-center fw-semibold text-dark">
                                {{ $products->firstItem() + $index }}
                            </td>

                            <!-- Nama -->
                            <td>

                                <div class="fw-semibold text-dark">
                                    {{ $p->name }}
                                </div>

                            </td>

                            <!-- Kategori -->
                            <td class="text-center">

                                <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                    {{ $p->category->name }}
                                </span>

                            </td>

                            <!-- Harga -->
                            <td class="fw-bold text-success text-center">

                                Rp {{ number_format($p->price, 0, ',', '.') }}

                            </td>

                            <!-- Stok -->
                            <td class="text-center">

                                <span class="badge bg-secondary-subtle text-dark border px-3 py-2 rounded-pill">
                                    {{ $p->stock }}
                                </span>

                            </td>

                            <!-- Deskripsi -->
                            <td style="max-width: 250px;">

                                <small class="text-muted">
                                    {{ $p->description }}
                                </small>

                            </td>

                            <!-- Status -->
                            <td class="text-center">

                                @if($p->status == 'tersedia')

                                    <span class="badge bg-success px-3 py-2 rounded-pill">
                                        Tersedia
                                    </span>

                                @else

                                    <span class="badge bg-danger px-3 py-2 rounded-pill">
                                        Habis
                                    </span>

                                @endif

                            </td>

                            <!-- Aksi -->
                            <td>

                                <div class="d-flex justify-content-center gap-2">

                                    <!-- Edit -->
                                    <a href="{{ route('products.edit', $p->id) }}"
                                       class="btn btn-warning btn-sm rounded-3 px-3 shadow-sm">

                                        <i class="bi bi-pencil-square me-1"></i>
                                        Edit

                                    </a>

                                    <!-- Hapus -->
                                    <form action="{{ route('products.destroy', $p->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm rounded-3 px-3 shadow-sm">

                                            <i class="bi bi-trash me-1"></i>
                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="text-center py-5">

                                <div class="text-muted">

                                    <i class="bi bi-inbox display-5 d-block mb-3"></i>

                                    <h5 class="mb-1">
                                        Data produk belum tersedia
                                    </h5>

                                    <small>
                                        Silakan tambahkan produk baru
                                    </small>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- Pagination -->
        <div class="card-footer bg-white border-0 py-3">

            <div class="d-flex justify-content-center">

                {{ $products->links('pagination::bootstrap-5') }}

            </div>

        </div>

    </div>

</div>

@endsection