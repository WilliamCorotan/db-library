<section class="container-fluid bg-primary py-3 px-4 pt-5">
    <div class="px-4 py-3 bg-primary-subtle text-capitalize mb-5">
        <h6 id="greeting-card" class="display-6 fw-medium"></h6>
        <span>Here is what's happening with your projects today:</span>
    </div>

    <div class="grid grid-cols-3 gap-3 mb-5">

        <div class=" bg-white p-0">
            <div>
                <h4 class="fw-semibold text-center text-md-start">User Status</h4>
            </div>
            <div id="users-card">
                <canvas id="users-chart"></canvas>
            </div>
        </div>

        <div class=" bg-white p-0">
            <div>
                <h4 class="fw-semibold text-center text-md-start"> Admin Status</h4>
            </div>
            <div id="admins-card">
                <canvas id="admins-chart"></canvas>
            </div>
        </div>

        <div class=" bg-white  p-0">
            <div>
                <h4 class="fw-semibold text-center text-md-start"> Random Stats</h4>
            </div>
            <div id="random-card">
                <canvas id="random-chart"></canvas>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="<?= base_url('assets/js/admin/index.js') ?>"></script>