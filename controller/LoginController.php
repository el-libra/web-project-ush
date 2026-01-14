<?php
// Authentication Controller
class LoginController {
    private $conn;
    public function __construct($database) {
        $this->conn = $database;
    }
    // Method untuk proses login
    public function login($email, $password) {
        // Escape input untuk mencegah SQL Injection
        // real_escape_string digunakan untuk membersihkan karakter berbahaya
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);
        // Query untuk mencari user dengan email dan password yang sesuai
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $this->conn->query($query);
        // Jika user ditemukan, simpan data user ke dalam session
        // cek apakah hasil ada dari query
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
        //    Sesssion start dilakukan di index.php
           if($password === $user['password']){
            // Simpan data user ke session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            return true; // Login berhasil
           }
        } else {
            return false; // Login gagal

        }
    }
    // Method untuk proses logout
    public function logout() {
        // Hapus semua data session
        session_destroy();
        return true;
    }
    // Method untuk Register User Baru
    public function register($name, $email, $password) {
        // Escape input untuk mencegah SQL Injection
        $name = $this->conn->real_escape_string($name);
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);
        // Cek apakah email sudah terdaftar
        $checkQuery = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $checkResult = $this->conn->query($checkQuery);
        if ($checkResult && $checkResult->num_rows > 0) {
            return "Email sudah terdaftar"; // Email sudah terdaftar
        }
        // Query untuk menambahkan user baru
        $insertQuery = "INSERT INTO users (name, email, password, role, created_at) 
        VALUES ('$name', '$email', '$password', 'user', NOW())";

        if ($this->conn->query($insertQuery) === TRUE) {
            return true; // Registrasi berhasil
        } else {
            return $this->conn->error; // Registrasi gagal
        }
    }
}