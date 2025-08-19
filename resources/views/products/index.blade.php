<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Produk</h4>
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm">+ Tambah Produk</a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th width="180">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td><span class="badge bg-primary">{{ $product->stock }}</span></td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada produk.</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
