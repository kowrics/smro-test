<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?php $title = 'Edit Medicine'; ?>

<div class="card border-0 shadow-sm p-4" style="max-width:600px">
    <h6 class="fw-bold mb-4">Edit Medicine</h6>
<form action="<?= base_url('medicines/' . $medicine['id']) ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3">
            <label class="form-label">Name *</label>
            <input type="text" name="name" class="form-control" value="<?= old('name', $medicine['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" value="<?= old('category', $medicine['category']) ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3"><?= old('description', $medicine['description']) ?></textarea>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Unit *</label>
                <input type="text" name="unit" class="form-control" value="<?= old('unit', $medicine['unit']) ?>" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Stock *</label>
                <input type="number" name="stock" class="form-control" value="<?= old('stock', $medicine['stock']) ?>" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Supplier</label>
            <select name="supplier_id" class="form-select">
                <option value="">-- Select Supplier --</option>
                <?php foreach ($suppliers as $s): ?>
                <option value="<?= $s['id'] ?>" <?= $medicine['supplier_id'] == $s['id'] ? 'selected' : '' ?>><?= esc($s['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-4">
            <label class="form-label">Image</label>
            <?php if ($medicine['image']): ?>
                <div class="mb-2"><small class="text-muted">Current: <?= $medicine['image'] ?></small></div>
            <?php endif; ?>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Update</button>
<a href="<?= base_url('medicines') ?>" class="btn btn-outline-secondary">Cancel</a>        </div>
    </form>
</div>

<?= $this->endSection() ?>