// Script untuk Frontend

document.addEventListener('DOMContentLoaded', function() {
//load books jika ada container
const booksContainer = document.getElementById('books-container');
if (booksContainer) {
    loadBooks();
    }
});

// load buku dari server
function loadBooks(search = '') {
    const booksContainer = document.getElementById('books-container');
    fetch(`api/books.php?search=${search}`
        .then(response => response.json()
        .then(data =>{
            if(data.success && data.books.length > 0){
                let html = '';
                data.books.forEach(book => {
                    html += `
                        <div class="col-md-3 mb-4">
                            <div class="card book-card">
                                <img src="assets/img/${book.cover_image}" class="card-img-top book-cover" alt="${book.title}">
                                <div class="card-body">
                                    <h5 class="book-title">${book.title}</h5>
                                    <p class="book-author">${book.author}</p>
                                    <p class="book-price">Rp ${parseInt(book.price).toLocaleString('id-ID')}</p>
                                    <button class="btn btn-primary btn-sm w-100">
                                        Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                booksContainer.innerHTML = html;
            } else {
                booksContainer.innerHTML = '<div class="col-12"><p class="text-center text-muted">Buku tidak ditemukan</p></div>';
            }
        })
        .catch(error => {
            console.error('Error fetching books:', error);
            booksContainer.innerHTML = '<div class="col-12"><p class="text-center text-danger">Terjadi kesalahan saat memuat buku</p></div>';
        })
    ));
}
// cari buku dengan keywoard
function searchBooks() {
    const searchInput = document.getElementById('input[search]');
    if (searchInput) {
        const keyword = searchInput.value;
        loadBooks(keyword);
    }
}