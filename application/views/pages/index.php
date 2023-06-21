<section id="main-homepage" class="container py-5">
    <div>
        <h4 class="display-4 d-block"> Latest Collections</h4>
        <input type="hidden" id="page-number">
        <input type="hidden" id="total-books">
        <input type="hidden" id="limit">
        <div id="book-card-container" class="grid grid-cols-5 gap-3">
        </div>
    </div>
</section>

<script src="<?= base_url('assets/js/user/index.js') ?>"></script>
<script src="<?= base_url('assets/js/user/fetchBookCard.js') ?>"></script>