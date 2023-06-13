<section id="books-section" class="h-100">
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>All Books</h3>
            <div class="d-flex gap-4">
                <input id="book-search" class="form-control" type="search" placeholder="Search" aria-label="Search">
                <div class="d-grid gap-2">
                    <a name="add-book" id="add-book" class="btn btn-success" href="<?= base_url('book/add') ?>">Add</a>
                </div>
            </div>
        </div>
        <div id="book-table-container" class="overflow-x-scroll"></div>
        <?php $this->load->view('components/books/book_modal') ?>
    </div>
</section>

<script src="<?= base_url('assets/js/pagination/fetchBooks.js') ?>"></script>
<script src="<?= base_url('assets/js/book/index.js') ?>"></script>
<script src="<?= base_url('assets/js/book/searchBook.js') ?>"></script>
<script src="<?= base_url('assets/js/book/showBook.js') ?>"></script>
<script src="<?= base_url('assets/js/book/editBook.js') ?>"></script>