<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/login.css');?>">
    <title>Login admin</title>
</head>
<body>
    <h2>Login</h2>
    
    <form action="" method="post">
        <?= csrf_field() ?>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (session()->getFlashdata('flash_msg')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('flash_msg') ?>
            </div>
        <?php endif; ?>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
        </div>
<br>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" autocomplete="new-password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <!-- Menampilkan validasi form jika ada error -->
    <?php if (isset($validation)): ?>
        <div class="validation-errors">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
</body>
</html>
