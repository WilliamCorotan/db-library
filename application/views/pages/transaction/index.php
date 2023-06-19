<section id="transactions-section" class="h-100">
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-4">
            <h3>All Transactions</h3>
            <div class="d-flex gap-4">
                <input id="transaction-search" class="form-control" type="search" placeholder="Search" aria-label="Search">
            </div>
        </div>
        <div id="transaction-table-container" class="overflow-x-scroll"></div>
    </div>
</section>


<script src="<?= base_url('assets/js/transaction/fetchTransactions.js') ?>"></script>
<script src="<?= base_url('assets/js/transaction/searchTransaction.js') ?>"></script>
<script src="<?= base_url('assets/js/transaction/index.js') ?>"></script>