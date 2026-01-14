/**
 * admin.js - Script untuk Admin Dashboard
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('Admin Dashboard Ready');
    loadStatistics();
    loadRecentBooks();
});

/**
 * Load statistik dashboard
 */
function loadStatistics() {
    fetch('api/statistics.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('totalBooks').textContent = data.totalBooks;
                document.getElementById('totalUsers').textContent = data.totalUsers;
                document.getElementById('todayTransactions').textContent = data.todayTransactions;
                document.getElementById('totalRevenue').textContent = 'Rp ' + parseInt(data.totalRevenue).toLocaleString('id-ID');
            }
        })
        .catch(error => console.error('Error loading statistics:', error));
}

/**
 * Load buku terbaru untuk tabel
 */
function loadRecentBooks() {
    fetch('api/books.php?limit=10')
        .then(response => response.json())
        .then(data => {
            if (data.success && data.books.length > 0) {
                const tbody = document.querySelector('#booksTable tbody');
                let html = '';
                
                data.books.forEach(book => {
                    html += `
                        <tr>
                            <td>${book.id}</td>
                            <td>${book.title}</td>
                            <td>${book.author}</td>
                            <td>Rp ${parseInt(book.price).toLocaleString('id-ID')}</td>
                            <td>
                                <a href="?page=admin&action=edit&id=${book.id}" class="btn btn-sm btn-warning">Edit</a>
                                <button onclick="deleteBook(${book.id})" class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                    `;
                });
                
                tbody.innerHTML = html;
            }
        })
        .catch(error => console.error('Error loading books:', error));
}

/**
 * Hapus buku
 */
function deleteBook(id) {
    if (confirm('Yakin ingin menghapus buku ini?')) {
        fetch('api/books.php?action=delete&id=' + id, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Buku berhasil dihapus');
                loadRecentBooks();
            } else {
                alert('Gagal menghapus buku: ' + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
