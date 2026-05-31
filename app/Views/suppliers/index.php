<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Suppliers'; ?>
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h6 class="mb-0 fw-bold">Supplier List</h6>
<a href="<?= base_url('suppliers/new') ?>" class="btn btn-primary btn-sm">+ Add Supplier</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>Name</th><th>Contact</th><th>Address</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php foreach ($suppliers as $s): ?>
            <tr>
                <td><?= esc($s['name']) ?></td>
                <td><?= esc($s['contact']) ?></td>
                <td><?= esc($s['address']) ?></td>
                <td>
<a href="<?= base_url('suppliers/' . $s['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary">Edit</a>
<form action="<?= base_url('suppliers/' . $s['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">                        <?= csrf_field() ?>
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