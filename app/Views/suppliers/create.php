<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Add Supplier'; ?>
<div class="card border-0 shadow-sm p-4" style="max-width:500px">
    <h6 class="fw-bold mb-4">Add New Supplier</h6>
<form action="<?= base_url('suppliers') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control">
        </div>
        <div class="mb-4">
            <label class="form-label">Address</label>
            <textarea name="address" class="form-control" rows="3"></textarea>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Save</button>
<a href="<?= base_url('suppliers') ?>" class="btn btn-outline-secondary">Cancel</a>        </div>
    </form>
</div>
<?= $this->endSection() ?>