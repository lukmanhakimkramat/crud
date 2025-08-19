<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-warning d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Edit Produk</h4>
            <a href="{{ route('products.index') }}" class="btn btn-dark btn-sm">← Kembali</a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa inputan:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
