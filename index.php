<?php
// Entry point of the application & router
// Semua request akan diarahkan ke sini (index.php)
// 1. Setup Session: Inisialisasi session untuk manajemen user
session_start();
// 2. Load Config: Memuat konfigurasi database dan pengaturan lainnya
require_once 'config/db_koneksi.php';
// 3. Include Controllers: Memuat semua controller yang dibutuhkan
require_once 'controllers/BookController.php';
require_once 'controllers/UserController.php';
// 4. Inisialisasi Base_URL untuk routing dinamis
if(!defined('BASE_URL')){
    define('BASE_URL', 'http://localhost/press_book/');
}
// 5. Instance Controllers
$bookController = new BookController($conn);
$loginController = new LoginController($conn);
// 6. Parse URL parameters
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : null;
// 7. Handle actions (Login, Logout, Register, dll)
// - Get akses (Email & Password) dari form login
// - Call LoginController->login() atau logout()
// - Jika berhasil: redirect ke halaman dashboard
// - Jika gagal: kembali ke halaman login dengan error message
// Handle Login Action:
if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // GET input dari form login
    $email = $_POST['email'] ? $_POST['email'] : ' ';
    $password = $_POST['password'] ? $_POST['password'] : ' ';
    // Panggil method login di LoginController
    if ($loginController->login($email, $password)) {
        // Redirect ke dashboard jika login berhasil
        header("Location: " . BASE_URL . "index.php?page=dashboard");
        exit();
    } else {
        // Redirect kembali ke halaman login dengan pesan error
        header("Location: " . BASE_URL . "index.php?page=login&error=Email atau password salah");
        exit();
    }
}
// Handle Logout Action:
if ($action === 'logout') {
    // panggil method logout di LoginController
    $loginController->logout();
    // Redirect ke halaman login
    header("Location: " . BASE_URL);
    exit();
}
// 8. Routing berdasarkan halaman yang diminta
switch ($page) {
    // Login Page
    case 'login':
        require 'views/login.php';
        break;
    // Katalog Buku
    case 'katalog':
        require 'views/katalog.php';
        break;
    // admin dashboard
    case 'admin':
        require 'views/admin/dashboard.php';
        break;
    // Home Page
    case 'home':
        require 'views/home.php';
        break;
}
