 
<!DOCTYPE html> 
<html lang='id'> 
<head> 
    <meta charset='UTF-8'> 
    <title>403 - Akses Ditolak</title> 
    <link 
href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' 
rel='stylesheet'> 
</head> 
<body class='bg-light'> 
    <div class='container text-center mt-5'> 
        <div class='display-1 text-danger'>403</div> 
        <h2>Akses Ditolak</h2> 
        <p class='text-muted'> 
            Anda tidak memiliki izin untuk mengakses halaman ini. 
            Silakan hubungi administrator jika Anda merasa ini adalah kesalahan. 
        </p> 
        <a href='{{ url()->previous() }}' class='btn btn-secondary me-2'> 
            ← Kembali 
        </a> 
        <a href='{{ route("products.index") }}' class='btn btn-primary'> 
            Ke Halaman Utama 
        </a> 
    </div> 
</body> 
</html>