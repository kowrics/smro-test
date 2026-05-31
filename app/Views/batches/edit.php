<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Edit Batch'; ?>
<div class="card border-0 shadow-sm p-4" style="max-width:500px">
    <h6 class="fw-bold mb-4">Edit Batch</h6>
<form action="<?= base_url('batches/' . $batch['id']) ?>" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <label class="form-label">Medicine *</label>
            <select name="medicine_id" class="form-select" required>
                <?php foreach ($medicines as $m): ?>
                <option value="<?= $m['id'] ?>" <?= $batch['medicine_id'] == $m['id'] ? 'selected' : '' ?>><?= esc($m['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Batch Number *</label>
            <input type="text" name="batch_number" class="form-control" value="<?= $batch['batch_number'] ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity *</label>
            <input type="number" name="quantity" class="form-control" value="<?= $batch['quantity'] ?>" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Expiry Date *</label>
            <input type="date" name="expiry_date" class="form-control" value="<?= $batch['expiry_date'] ?>" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
<a href="<?= base_url('batches') ?>" class="btn btn-outline-secondary">Cancel</a>        </div>
    </form>
</div>
<?= $this->endSection() ?>