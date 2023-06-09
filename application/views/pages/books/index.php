<section id="books-section" class="bg-success h-100">
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>All Books</h3>
            <div class="d-flex gap-4">
                <input id="book-search" class="form-control" type="search" placeholder="Search" aria-label="Search">
            </div>
        </div>
        <div id="book-table-container" class="overflow-x-scroll"></div>
    </div>
</section>

<script src="<?= base_url('assets/js/pagination/fetchBooks.js') ?>"></script>
<script src="<?= base_url('assets/js/book/index.js') ?>"></script>
<script src="<?= base_url('assets/js/book/searchBook.js') ?>"></script>