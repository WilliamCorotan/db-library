<section id="book-view-container" class="mx-auto mt-5 container">
    <div class=" mx-5">
        <button type="button" name="back-button" id="back-button" class="btn rounded-circle"><i class="fa-solid fa-reply-all"></i></button>
    </div>
    <div class="row ">
        <aside class="col-12 col-lg-4 ">
            <div class="px-4 py-3 row align-items-center" style="height: 30rem;">
                <img src="<?= base_url("assets/images/books/") . $book['cover_image'] ?>" alt="<?= $book['title'] ?> cover image" class=" h-100 p-0 object-fit-cover border border-dark">
            </div>

            <div class="px-4 pb-3">
                <?php if ($book['borrow_status_id'] == 1) : ?>
                    <div class="d-grid gap-2">
                        <button type="button" name="borrow-btn" id="borrow-btn" class="btn btn-primary w-50 mx-auto">Borrow</button>
                    </div>
                <?php else : ?>
                    <div class="d-grid gap-2">
                        <span name="" id="" class="text-bg-danger px-3 py-2 rounded text-center w-50 mx-auto">Not Available</span>
                    </div>
                <?php endif ?>
            </div>
        </aside>
        <article class="col-12 col-lg-8">
            <div class="px-4 py-3">
                <h4 class="display-4"><?= $book['title'] ?></h4>
                <span> <?= $book['author'] ?></span>
            </div>
            <div class="px-4 pb-3">
                <hr>
                <h4>Description</h4>
                <p><?= $book['description'] ?></p>
            </div>
            <div class="px-4 pb-3 row">
                <div class="col-12 col-md-6">
                    <div class="mx-1 px-2 py-3 rounded border  row mx-0">
                        <h6 class="fw-bold">Publish Date</h6>
                        <span><?= $book['publish_date'] ?></span>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="mx-1 px-2 py-3 rounded border row">
                        <h6 class="fw-bold">Publisher</h6>
                        <span><?= $book['publisher'] ?></span>
                    </div>
                </div>
            </div>
            <div class="px-4 pb-3 gap-3 row">
                <div>
                    <div class="mx-1 px-2 py-3 rounded d-flex align-items-center">
                        <span class="fw-bold">Call Number: <span class="fw-normal"><?= $book['call_number'] ?></span></span>

                    </div>
                </div>

                <div>
                    <div class="mx-1 px-2 py-3 rounded d-flex align-items-center">
                        <span class="fw-bold">Subject: <span class="fw-normal"><?= $book['subject'] ?></span></span>

                    </div>
                </div>
            </div>
        </article>
    </div>
</section>

<?php $this->load->view('components/transaction/first_save') ?>
<?php $this->load->view('pages/user/collection/book/borrow_book') ?>
<script src="<?= base_url('assets/js/user/index.js') ?>"></script>
<script src="<?= base_url('assets/js/book/borrowBook.js') ?>"></script>