<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMRO - <?= $title ?? 'Dashboard' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f4f6f9; }
        .sidebar { width: 240px; min-height: 100vh; background: #1a6fc4; position: fixed; top: 0; left: 0; }
        .sidebar .brand { padding: 1.5rem; color: white; font-size: 1.2rem; font-weight: 600; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar .nav-link { color: rgba(255,255,255,0.8); padding: 0.7rem 1.5rem; display: flex; align-items: center; gap: 10px; }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background: rgba(255,255,255,0.15); color: white; }
        .sidebar .nav-label { font-size: 11px; color: rgba(255,255,255,0.4); padding: 1rem 1.5rem 0.3rem; text-transform: uppercase; letter-spacing: 1px; }
        .main-content { margin-left: 240px; padding: 2rem; }
        .topbar { background: white; padding: 1rem 2rem; margin: -2rem -2rem 2rem; border-bottom: 1px solid #e0e0e0; display: flex; justify-content: space-between; align-items: center; }
        .badge-role { font-size: 11px; }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="brand">💊 SMRO</div>
    <div class="nav-label">Main</div>
    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= (uri_string() === 'dashboard') ? 'active' : '' ?>">
        <i class="bi bi-speedometer2"></i> Dashboard
    </a>
    <a href="<?= base_url('medicines') ?>" class="nav-link <?= (str_contains(uri_string(), 'medicine')) ? 'active' : '' ?>">
        <i class="bi bi-capsule"></i> Medicines
    </a>
    <a href="<?= base_url('batches') ?>" class="nav-link <?= (str_contains(uri_string(), 'batch')) ? 'active' : '' ?>">
        <i class="bi bi-boxes"></i> Batches
    </a>
    <?php if (in_array(session()->get('user_role'), ['superadmin', 'manager'])): ?>
    <a href="<?= base_url('suppliers') ?>" class="nav-link <?= (str_contains(uri_string(), 'supplier')) ? 'active' : '' ?>">
        <i class="bi bi-truck"></i> Suppliers
    </a>
    <?php endif; ?>
    <?php if (session()->get('user_role') === 'superadmin'): ?>
    <div class="nav-label">Admin</div>
    <a href="<?= base_url('users') ?>" class="nav-link <?= (str_contains(uri_string(), 'user')) ? 'active' : '' ?>">
        <i class="bi bi-people"></i> Users
    </a>
    <?php endif; ?>
</div>

<div class="main-content">
    <div class="topbar">
        <h5 class="mb-0"><?= $title ?? 'Dashboard' ?></h5>
        <div class="d-flex align-items-center gap-3">
            <span class="badge bg-primary badge-role"><?= strtoupper(session()->get('user_role')) ?></span>
            <span class="text-muted"><?= session()->get('user_name') ?></span>
            <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-outline-danger">Logout</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>