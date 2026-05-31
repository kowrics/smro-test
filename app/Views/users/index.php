<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Users'; ?>
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h6 class="mb-0 fw-bold">User List</h6>
<a href="<?= base_url('users/new') ?>" class="btn btn-primary btn-sm">+ Add User</a>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php foreach ($users as $u): ?>
            <tr>
                <td><?= esc($u['name']) ?></td>
                <td><?= esc($u['email']) ?></td>
                <td><span class="badge bg-primary"><?= $u['role'] ?></span></td>
                <td>
<a href="<?= base_url('users/' . $u['id'] . '/edit') ?>" class="btn btn-sm btn-outline-primary">Edit</a>
<form action="<?= base_url('users/' . $u['id']) ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
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