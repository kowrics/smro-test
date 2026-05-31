<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<?php $title = 'Dashboard'; ?>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="fs-1 text-primary">💊</div>
            <h3 class="fw-bold"><?= $total_medicines ?></h3>
            <div class="text-muted">Total Medicines</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="fs-1">🚛</div>
            <h3 class="fw-bold"><?= $total_suppliers ?></h3>
            <div class="text-muted">Suppliers</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="fs-1 text-warning">⚠️</div>
            <h3 class="fw-bold text-warning"><?= $expiring_soon ?></h3>
            <div class="text-muted">Expiring in 30 days</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm text-center p-3">
            <div class="fs-1 text-danger">❌</div>
            <h3 class="fw-bold text-danger"><?= $expired ?></h3>
            <div class="text-muted">Expired Batches</div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm p-4">
    <h6 class="fw-bold mb-3">Quick Actions</h6>
    <div class="d-flex gap-2 flex-wrap">
<a href="<?= base_url('medicines/new') ?>" class="btn btn-primary">+ Add Medicine</a>
<a href="<?= base_url('batches/new') ?>" class="btn btn-outline-primary">+ Add Batch</a>
        <?php if (in_array(session()->get('user_role'), ['superadmin','manager'])): ?>
<a href="<?= base_url('suppliers/new') ?>" class="btn btn-outline-secondary">+ Add Supplier</a>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
