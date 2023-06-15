<section id="book-view-container" class="mx-0 mt-5">
    <div class=" mx-5">
        <button type="button" name="back-button" id="back-button" class="btn btn-dark rounded-circle"><i class="fa-solid fa-reply-all"></i></button>
    </div>
    <div class="row ">
        <aside class="col-12 col-lg-4 ">
            <div class="px-4 py-3">
                <img src="<?= base_url("assets/images/books/") . $book['cover_image'] ?>" alt="" class="w-100 object-fit-contain" style="height: 40rem;">
            </div>

            <div class="px-4 pb-3">
                <?php if ($book['borrow_status_id'] == 1) : ?>
                    <div class="d-grid gap-2">
                        <button type="button" name="borrow-btn" id="borrow-btn" class="btn btn-primary">Borrow</button>
                    </div>
                <?php else : ?>
                    <div class="d-grid gap-2">
                        <span name="" id="" class="text-bg-danger px-3 py-2 rounded text-center">Not Available</span>
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

<script src="<?= base_url('assets/js/user/index.js') ?>"></script>