<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Edit Supplier'; ?>
<div class="card border-0 shadow-sm p-4" style="max-width:500px">
    <h6 class="fw-bold mb-4">Edit Supplier</h6>
<form action="<?= base_url('suppliers/' . $supplier['id']) ?>" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" value="<?= esc($supplier['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" value="<?= esc($supplier['contact']) ?>">
        </div>
        <div class="mb-4">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" rows="3"><?= esc($supplier['address']) ?></textarea>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
<a href="<?= base_url('suppliers') ?>" class="btn btn-outline-secondary">Cancel</a>        </div>
    </form>
</div>
<?= $this->endSection() ?>