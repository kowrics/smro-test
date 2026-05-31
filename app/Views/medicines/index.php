<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Medicines'; ?>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h6 class="mb-0 fw-bold">Medicine List</h6>
        <a href="<?= base_url('medicines/new') ?>" class="btn btn-primary btn-sm">+ Add Medicine</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Name</th><th>Category</th><th>Unit</th><th>Stock</th><th>Supplier</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($medicines as $m): ?>
            <tr>
                <td><?= esc($m['name']) ?></td>
                <td><?= esc($m['category']) ?></td>
                <td><?= esc($m['unit']) ?></td>
                <td><span class="badge <?= $m['stock'] < 50 ? 'bg-danger' : 'bg-success' ?>"><?= $m['stock'] ?></span></td>
                <td><?= esc($m['supplier_name'] ?? '-') ?></td>
                <td>
                    <a href="<?= base_url('medicines/' . $m['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                    <form action="<?= base_url('medicines/' . $m['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this medicine?')">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-white"><?= $pager->links() ?></div>
</div>

<?= $this->endSection() ?>