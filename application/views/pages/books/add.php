<section id="add-book-section" class="container mt-5 px-4 py-3 bg-light rounded">
    <h3>Add Book</h3>
    <hr>
    <?= form_open_multipart('', array('id' => 'add-book-form')) ?>
    <div class="row px-4 py-3">
        <div class="col-12 col-lg-3">
            <input type="file" class="form-control" name="cover_image" id="cover_image">
        </div>
        <div class="col-12 col-lg-9">

            <div class="mb-3 row">
                <label for="title" class="col-lg-2 col-form-label">Title</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="titleId" placeholder="Book Title">
                    <small id="title-error" class="form-errors text-danger"></small>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="description" class="col-lg-2 col-form-label">Description</label>
                <div class="col-lg-10">
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Book Description..."></textarea>
                    <small id="description-error" class="form-errors text-danger"></small>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="author" class="col-lg-2 col-form-label">Author</label>
                <div class="col-lg-10 position-relative">
                    <input type="text" class="form-control" name="author" id="author" aria-describedby="authorId" placeholder="Author">
                    <div id="author-hint" class="rounded list-group">
                    </div>
                    <small id="author-error" class="form-errors text-danger"></small>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="subject" class="col-lg-2 col-form-label">Subject</label>
                <div class="col-lg-10  position-relative">
                    <input type="text" class="form-control" name="subject" id="subject" aria-describedby="subjectId" placeholder="Subject">
                    <div id="subject-hint" class="rounded list-group">
                    </div><small id="subject-error" class="form-errors text-danger"></small>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="call_number" class="col-lg-2 col-form-label">Call Number</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="call_number" id="call_number" aria-describedby="call_numberId" placeholder="Call Number">
                    <small id="call-number-error" class="form-errors text-danger"></small>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="publisher" class="col-lg-2 col-form-label">Publisher</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="publisher" id="publisher" aria-describedby="publisherId" placeholder="Publisher">
                    <small id="publisher-error" class="form-errors text-danger"></small>
                    <div id="publisher-hint" class="rounded list-group">
                    </div>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="publish_date" class="col-lg-2 col-form-label">Publish Year</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" name="publish_date" id="publish_date" aria-describedby="publish_dateId" placeholder="Publish Year">
                    <small id="publish_date-error" class="form-errors text-danger"></small>
                </div>
            </div>

            <div class="mb-3 text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    <?= form_close() ?>
</section>

<script src="<?= base_url('assets/js/book/filterAuthor.js') ?>"></script>
<script src="<?= base_url('assets/js/book/filterSubject.js') ?>"></script>
<script src="<?= base_url('assets/js/book/filterPublisher.js') ?>"></script>
<script src="<?= base_url('assets/js/book/addBook.js') ?>"></script>