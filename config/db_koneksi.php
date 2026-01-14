<?php

// Alamat server database
define('DB_HOST', 'localhost');
// Nama pengguna database
define('DB_USER', 'root');
// Kata sandi pengguna database
define('DB_PASS', '');
// Nama database
define('DB_NAME', 'press_book');
// Port database 
define('DB_PORT', 3306);

// Membuat koneksi ke database
// Set charset ke utf8mb4
try{
    // Buat koneksi menggunakan mysqli
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

    // cek apakah koneksi berhasil
    if ($conn->connect_error) {
        throw new Exception("Koneksi gagal: " . $conn->connect_error);
    }
    // Set charset ke utf8mb4
    $conn->set_charset("utf8mb4");
}catch(Exception $e){
    die("Database Error: " . $e->getMessage());
}
// Production: ubah nama domain anda
define('BASE_URL', 'http://localhost/press_book/');
?>



