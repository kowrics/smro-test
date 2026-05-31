<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Add User'; ?>
<div class="card border-0 shadow-sm p-4" style="max-width:500px">
    <h6 class="fw-bold mb-4">Add New User</h6>
<form action="<?= base_url('users') ?>" method="POST">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email *</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password *</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Role *</label>
            <select name="role" class="form-select" required>
                <option value="staff">Staff</option>
                <option value="manager">Manager</option>
                <option value="superadmin">SuperAdmin</option>
            </select>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Save</button>
<a href="<?= base_url('users') ?>" class="btn btn-outline-secondary">Cancel</a>        </div>
    </form>
</div>
<?= $this->endSection() ?>