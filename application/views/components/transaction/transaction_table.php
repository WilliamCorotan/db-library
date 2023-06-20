<?php if (!empty($transactions)) : ?>
    <table class="table table-hover bg-amber-100">
        <thead>
            <tr class="align-middle">
                <th class="col-1">ID</th>
                <th class="col-2">Book Title</th>
                <th class="col-1">Borrow Date</th>
                <th class="col-1">Due Date</th>
                <th class="col-2">First Name</th>
                <th class="col-2">Last Name</th>
                <th class="col-2">Contact Number</th>
                <th class="col-2">Return Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactions as $transaction) : ?>
                <tr class="align-middle transaction-row" data-transaction-id="<?= $transaction['id'] ?>">
                    <td scope="row" class="fw-bold"><?= $transaction['id'] ?></td>
                    <td><?= $transaction['book_title'] ?></td>
                    <td><?= $transaction['borrow_date'] ?></td>
                    <td><?= $transaction['due_date'] ?></td>
                    <td><?= $transaction['first_name'] ?></td>
                    <td><?= $transaction['last_name'] ?></td>
                    <td><?= $transaction['contact_number'] ?></td>
                    <td class="fw-bold <?= ($transaction['return_status'] == 'Returned') ? "text-success" : "text-danger" ?>"><?= $transaction['return_status'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
<?php else : ?>
    <div class="text-center mt-5">
        <h3> No transactions available! </h3>
    </div>
<?php endif; ?>

<nav>
    <?php echo $this->pagination->create_links(); ?>
</nav>