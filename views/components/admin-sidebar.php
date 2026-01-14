<?php
/**
 * Admin Sidebar Component
 */
?>
<div class="admin-sidebar pt-4">
    <div class="text-white px-3 mb-4">
        <h5>Admin Panel</h5>
    </div>
    
    <a href="<?php echo BASE_URL; ?>index.php?page=admin" class="active">
        📊 Dashboard
    </a>
    <a href="<?php echo BASE_URL; ?>index.php?page=admin&action=books">
        📚 Kelola Buku
    </a>
    <a href="<?php echo BASE_URL; ?>index.php?page=admin&action=users">
        👥 Kelola User
    </a>
    <a href="<?php echo BASE_URL; ?>index.php?page=admin&action=orders">
        📦 Pesanan
    </a>
    <a href="<?php echo BASE_URL; ?>index.php?page=admin&action=settings">
        ⚙️ Pengaturan
    </a>
    
    <hr class="bg-white-50 my-4">
    
    <a href="<?php echo BASE_URL; ?>" class="text-white-50">
        ← Kembali ke Toko
    </a>
    <a href="<?php echo BASE_URL; ?>index.php?action=logout" class="text-white-50">
        🚪 Logout
    </a>
</div>
