<section class="container-fluid bg-primary py-3 px-4 pt-5">
    <div class="px-4 py-3 bg-primary-subtle text-capitalize mb-5">
        <h6 id="greeting-card" class="display-6 fw-medium"></h6>
        <span>Here is what's happening with your projects today:</span>
    </div>

    <div class="grid grid-cols-2 gap-3 mb-5">

        <div class=" bg-white p-0">
            <div id="users-card" class="w-100">
            </div>
        </div>

        <div class=" bg-white p-0">
            <div id="admins-card" class="w-100">
            </div>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-3 mb-5">

        <div class=" bg-white p-0">
            <div id="book-subjects-card" class="w-100">
            </div>
        </div>

        <div class=" bg-white p-0">
            <div id="book-authors-card" class="w-100">
            </div>
        </div>

        <div class=" bg-white p-0">
            <div id="book-publishers-card" class="w-100">
            </div>
        </div>
    </div>
</section>

<script src="<?= base_url('assets/js/admin/index.js') ?>"></script>