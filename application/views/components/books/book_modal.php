<!-- Modal -->
<div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="book-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <?= form_open_multipart(
                '',
                array('id' => 'edit-book-form')
            ) ?>
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="id"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row px-4 py-3">
                    <div class="text-center">
                        <img id="cover_image" class="img-fluid mb-3" src="" alt="" style="max-width: 220px;">
                        <input type="file" class="form-control" name="cover_image" id="cover_image">
                    </div>
                    <div>
                        <input type="hidden" name="id" id="edit-id">
                        <div class="mb-3 row">
                            <label for="title" class="col-form-label">Title</label>
                            <div>
                                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleId" placeholder="Book Title">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="description" class="col-form-label">Description</label>
                            <div>
                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Book Description..."></textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">

                            <div>
                                <div class="mb-3">
                                    <label for="borrow_status" class="form-label">Borrow Status</label>
                                    <select class="form-select" name="borrow_status" id="borrow_status">
                                        <option value="1">Available</option>
                                        <option value="2">Borrowed</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="author" class="col-form-label">Author</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="author" id="author" aria-describedby="authorId" placeholder="Author">
                                <div id="author-hint" class="rounded list-group">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="subject" class="col-form-label">Subject</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="subject" id="subject" aria-describedby="subjectId" placeholder="Subject">
                                <div id="subject-hint" class="rounded list-group">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="call_number" class="col-form-label">Call Number</label>
                            <div>
                                <input type="text" class="form-control" name="call_number" id="call_number" aria-describedby="call_numberId" placeholder="Call Number">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="publisher" class="col-form-label">Publisher</label>
                            <div>
                                <input type="text" class="form-control" name="publisher" id="publisher" aria-describedby="publisherId" placeholder="Publisher">
                                <div id="publisher-hint" class="rounded list-group">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="publish_date" class="col-form-label">Publish Year</label>
                            <div>
                                <input type="text" class="form-control" name="publish_date" id="publish_date" aria-describedby="publish_dateId" placeholder="Publish Year">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/book/filterAuthor.js') ?>"></script>
<script src="<?= base_url('assets/js/book/filterSubject.js') ?>"></script>
<script src="<?= base_url('assets/js/book/filterPublisher.js') ?>"></script>