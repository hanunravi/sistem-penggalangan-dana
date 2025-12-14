<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Peduli Sesama</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f4f6f9; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-card { width: 100%; max-width: 400px; padding: 2rem; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); background: white; }
        .btn-primary { background-color: #0d6efd; border: none; }
        .btn-primary:hover { background-color: #0b5ed7; }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <h4 class="fw-bold">Admin Login</h4>
            <p class="text-muted">Masuk untuk mengelola donasi</p>
        </div>

        {{-- Menampilkan Error Jika Login Gagal --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="admin@peduli.com" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="******" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary py-2">Masuk Dashboard</button>
            </div>
        </form>
        
        <div class="text-center mt-3">
            <a href="{{ url('/') }}" class="text-decoration-none text-muted small">&larr; Kembali ke Website</a>
        </div>
    </div>

</body>
</html>