<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Edit User'; ?>
<div class="card border-0 shadow-sm p-4" style="max-width:500px">
    <h6 class="fw-bold mb-4">Edit User</h6>
<form action="<?= base_url('users/' . $user['id']) ?>" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" value="<?= esc($user['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="<?= esc($user['email']) ?>" disabled>
        </div>
        <div class="mb-4">
            <label class="form-label">Role *</label>
            <select name="role" class="form-select">
                <option value="staff" <?= $user['role'] === 'staff' ? 'selected' : '' ?>>Staff</option>
                <option value="manager" <?= $user['role'] === 'manager' ? 'selected' : '' ?>>Manager</option>
                <option value="superadmin" <?= $user['role'] === 'superadmin' ? 'selected' : '' ?>>SuperAdmin</option>
            </select>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
<a href="<?= base_url('users') ?>" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>