<?php if (!empty($books)) : ?>
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="align-middle">
                <th class="col-1">ID</th>
                <th class="col-1">Cover Image</th>
                <th class="col-1">Title</th>
                <th class="col-3">Description</th>
                <th class="col-1">Author</th>
                <th class="col-1">Subject</th>
                <th class="col-1">Call Number</th>
                <th class="col-1">Publisher</th>
                <th class="col-1">Publish Date</th>
                <th class="col-1">Borrow Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book) : ?>
                <tr class="align-middle book-row" data-book-id="<?= $book['id'] ?>">
                    <td scope="row" class="fw-bold"><?= $book['id'] ?></td>
                    <td class="text-center"><img src="<?= base_url("assets/images/books/") . $book['cover_image']  ?>" alt="<?= $book['title'] ?>" height="48px"></td>
                    <td><?= $book['title'] ?></td>
                    <td class="text-break"><?= word_limiter($book['description'], 16) ?></td>
                    <td><?= $book['author'] ?></td>
                    <td><?= $book['subject'] ?></td>
                    <td><?= $book['call_number'] ?></td>
                    <td><?= $book['publisher'] ?></td>
                    <td><?= $book['publish_date'] ?></td>
                    <td class="fw-bold <?= ($book['borrow_status'] == 'available') ? 'text-success' : 'text-danger' ?>"><?= $book['borrow_status'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else : ?>
    <div class="text-center mt-5">
        <h3> No Books available! </h3>
    </div>
<?php endif; ?>

<nav>
    <?php echo $this->pagination->create_links(); ?>
</nav>