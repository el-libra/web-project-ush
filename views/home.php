<?php
/**
 * Halaman Home/Utama
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Press Buku - Toko Buku Online Terpercaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">📚 Press Buku</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo BASE_URL; ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>index.php?page=katalog">Katalog</a>
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <?php if ($_SESSION['user_role'] === 'admin'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>index.php?page=admin">Admin</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>index.php?action=logout">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>index.php?page=login">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4 mb-4">Selamat Datang di Press Buku</h1>
                    <p class="lead mb-4">Temukan koleksi buku terbaik dengan harga terjangkau dan kualitas terjamin.</p>
                    <a href="<?php echo BASE_URL; ?>index.php?page=katalog" class="btn btn-light btn-lg">Jelajahi Katalog</a>
                </div>
                <div class="col-md-6">
                    <img src="https://via.placeholder.com/400x300?text=Press+Buku" alt="Banner" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <!-- Featured Books -->
        <section class="mb-5">
            <h2 class="mb-4">Buku Pilihan</h2>
            <div class="row" id="featuredBooks">
                <div class="col-12">
                    <p class="text-center text-muted">Memuat buku pilihan...</p>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section class="bg-light py-5 rounded">
            <div class="row">
                <div class="col-md-4 text-center mb-4">
                    <div class="mb-3">
                        <i class="bi bi-truck" style="font-size: 2rem; color: #3498db;"></i>
                    </div>
                    <h5>Pengiriman Cepat</h5>
                    <p>Pengiriman ke seluruh Indonesia dengan jaminan aman.</p>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="mb-3">
                        <i class="bi bi-shield-check" style="font-size: 2rem; color: #27ae60;"></i>
                    </div>
                    <h5>Aman & Terpercaya</h5>
                    <p>Transaksi aman dengan sistem pembayaran yang terpercaya.</p>
                </div>
                <div class="col-md-4 text-center mb-4">
                    <div class="mb-3">
                        <i class="bi bi-headset" style="font-size: 2rem; color: #e74c3c;"></i>
                    </div>
                    <h5>Layanan Pelanggan</h5>
                    <p>Tim support siap membantu 24/7 untuk kepuasan Anda.</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Press Buku</h5>
                    <p>Toko Buku Online Terpercaya dengan koleksi lengkap dan harga kompetitif.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo BASE_URL; ?>" class="text-white-50 text-decoration-none">Beranda</a></li>
                        <li><a href="<?php echo BASE_URL; ?>index.php?page=katalog" class="text-white-50 text-decoration-none">Katalog</a></li>
                        <li><a href="<?php echo BASE_URL; ?>index.php?page=login" class="text-white-50 text-decoration-none">Login</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Kontak</h5>
                    <p class="text-white-50">
                        Email: info@pressbuku.com<br>
                        Phone: +62 812 3456 7890<br>
                        Alamat: Jakarta, Indonesia
                    </p>
                </div>
            </div>
            <hr>
            <div class="text-center text-white-50">
                <p>&copy; 2025 Press Buku. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>
