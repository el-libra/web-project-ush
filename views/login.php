<?php
// jika sudah login, redirect ke halaman utama -->
if (isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL);
    exit();
}
?>
