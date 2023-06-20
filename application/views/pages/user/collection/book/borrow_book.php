<!-- Modal -->
<div class="modal fade" id="borrow-book-modal" tabindex="-1" aria-labelledby="borrowBookModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Borrow Book: <?= $book['title'] ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="borrow-book-form">
                <div class="modal-body px-3">
                    <input type="hidden" name="user_id" id="user_id" value="<?= $user['id'] ?>">
                    <input type="hidden" name="book_id" id="book_id" value="<?= $book['id'] ?>">
                    <input type="hidden" name="user_data" id="user_data">
                    <input type="hidden" name="save" id="save">
                    <h4>User Information</h4>
                    <div class="row mb-3 m-0">
                        <div class="mb-3 row">
                            <label for="first_name" class="form-label ">First Name</label>
                            <input type="text" class="form-control " name="first_name" id="first_name" aria-describedby="firstName" value="<?= $user['first_name'] ?>" placeholder="Enter your first name...">
                            <small id="first-name-error" class="form-errors text-danger"></small>
                        </div>
                        <div class="mb-3 row">
                            <label for="last_name" class="form-label ">Last Name</label>
                            <input type="text" class="form-control " name="last_name" id="last_name" aria-describedby="lastName" value="<?= $user['last_name'] ?>" placeholder="Enter your last name...">
                            <small id="last-name-error" class="form-errors text-danger"></small>
                        </div>
                        <div class="mb-3 row">
                            <label for="contact_number" class="form-label ">Contact Number</label>
                            <input type="text" class="form-control " name="contact_number" id="contact_number" aria-describedby="contactNumber" value="<?= $user['contact_number'] ?>" placeholder="Enter your contact number...">
                            <small id="contact-number-error" class="form-errors text-danger"></small>
                        </div>
                    </div>

                    <h4>Address Information</h4>
                    <div class="row mb-3 m-0">
                        <div class="mb-3 row">
                            <label for="street" class="form-label col-12 col-lg-4">Street</label>
                            <input type="text" class="form-control col-12 col-lg-8" name="street" id="street" aria-describedby="streetAddress" value="<?= $user['street'] ?>" placeholder="Enter your street address...">
                            <small id="street-error" class="form-errors text-danger"></small>
                        </div>

                        <div class="row  mb-3">
                            <label for="barangay" class="form-label col-12 col-lg-4">Barangay</label>
                            <input type="text" class="form-control col-12 col-lg-8 " name="barangay" id="barangay" aria-describedby="Barangay" value="<?= $user['barangay'] ?>" placeholder="Enter your barangay...">
                            <small id="barangay-error" class="form-errors text-danger"></small>
                        </div>

                        <div class="row  mb-3">
                            <label for="city" class="form-label col-12 col-lg-4">City</label>
                            <input type="text" class="form-control col-12 col-lg-8" name="city" id="city" aria-describedby="City" value="<?= $user['city'] ?>" placeholder="Enter your city...">
                            <small id="city-error" class="form-errors text-danger"></small>
                        </div>

                        <div class="mb-3 row">
                            <label for="province" class="form-label col-12 col-lg-4 ">Province</label>
                            <input type="text" class="form-control col-12 col-lg-8 " name="province" id="province" aria-describedby="Province" value="<?= $user['province'] ?>" placeholder="Enter your province...">
                            <small id="province-error" class="form-errors text-danger"></small>
                        </div>
                        <div class="mb-3 row">
                            <label for="zip_code" class="form-label col-12 col-lg-4 ">Zip Code</label>
                            <input type="text" class="form-control col-12 col-lg-8 " name="zip_code" id="zip_code" aria-describedby="zipCode" value="<?= $user['zip_code'] ?>" placeholder="Enter your zip code...">
                            <small id="zip-code-error" class="form-errors text-danger"></small>
                        </div>

                    </div>

                    <h4>Book Information</h4>
                    <div class="row mb-3 m-0">
                        <div class="mb-3 row">
                            <label for="title" class="form-label col-12 col-lg-4">Book Title</label>
                            <input type="text" class="form-control col-12 col-lg-8" name="title" id="title" aria-describedby="bookTitle" value="<?= $book['title'] ?>" placeholder="Enter your book title..." disabled>
                        </div>
                        <div class="mb-3 row">
                            <label for="call_number" class="form-label col-12 col-lg-4">Call Number</label>
                            <input type="text" class="form-control col-12 col-lg-8" name="call_number" id="call_number" aria-describedby="callNumber" value="<?= $book['call_number'] ?>" placeholder="Enter your call number..." disabled>
                        </div>
                    </div>

                    <div class="row mb-3 m-0">
                        <div class="mb-3 row">
                            <label for="borrow_date" class="form-label">Borrow Date</label>
                            <input type="date" class="form-control bg-body-secondary" name="borrow_date" id="borrow_date" aria-describedby="borrowDate" placeholder="Enter borrow date [current timestamp]" readonly>
                            <small id="borrow-date-error" class="form-errors text-danger"></small>
                        </div>
                        <div class="mb-3 row">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" name="due_date" id="due_date" aria-describedby="returnDate" placeholder="Enter Due Date [range=1week]">
                            <small id="return-date-error" class="form-errors text-danger"></small>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="borrow-book">Borrow</button>
            </div>
        </div>
    </div>
</div>