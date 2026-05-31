<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMRO - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .login-card { width: 100%; max-width: 420px; border-radius: 12px; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
        .login-header { background: #1a6fc4; color: white; border-radius: 12px 12px 0 0; padding: 2rem; text-align: center; }
    </style>
</head>
<body>
<div class="login-card card border-0">
    <div class="login-header">
        <h4 class="mb-1">💊 SMRO</h4>
        <small>Healthcare Supply Chain</small>
    </div>
    <div class="card-body p-4">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
<form action="<?= base_url('login') ?>" method="POST">            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
            </div>
            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div class="mt-3 text-center text-muted" style="font-size:12px;">
            superadmin@smro.com / admin123
        </div>
    </div>
</div>
</body>
</html>