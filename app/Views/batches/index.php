<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Batches'; ?>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h6 class="mb-0 fw-bold">Batch List</h6>
<a href="<?= base_url('batches/new') ?>" class="btn btn-primary btn-sm">+ Add Batch</a>    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>Batch #</th><th>Medicine</th><th>Quantity</th><th>Expiry Date</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php foreach ($batches as $b): ?>
            <?php
                $today = date('Y-m-d');
                $alert = date('Y-m-d', strtotime('+30 days'));
                $status = 'bg-success';
                $label  = 'Good';
                if ($b['expiry_date'] < $today) { $status = 'bg-danger'; $label = 'Expired'; }
                elseif ($b['expiry_date'] <= $alert) { $status = 'bg-warning text-dark'; $label = 'Expiring Soon'; }
            ?>
            <tr>
                <td><?= esc($b['batch_number']) ?></td>
                <td><?= esc($b['medicine_name']) ?></td>
                <td><?= $b['quantity'] ?></td>
                <td><?= $b['expiry_date'] ?></td>
                <td><span class="badge <?= $status ?>"><?= $label ?></span></td>
                <td>
<form action="<?= base_url('batches/' . $b['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">                        <?= csrf_field() ?>
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