<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Add Batch'; ?>
<div class="card border-0 shadow-sm p-4" style="max-width:500px">
    <h6 class="fw-bold mb-4">Add New Batch</h6>
<form action="<?= base_url('batches') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label class="form-label">Medicine *</label>
            <select name="medicine_id" class="form-select" required>
                <option value="">-- Select Medicine --</option>
                <?php foreach ($medicines as $m): ?>
                <option value="<?= $m['id'] ?>"><?= esc($m['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Batch Number *</label>
            <input type="text" name="batch_number" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity *</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Expiry Date *</label>
            <input type="date" name="expiry_date" class="form-control" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Save Batch</button>
<a href="<?= base_url('batches') ?>" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>