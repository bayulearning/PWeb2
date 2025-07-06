<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
<div class="login_form_container">
    <form action="" method="post" class="login_form">
        <?= csrf_field() ?>

        <!-- Menampilkan pesan error jika ada -->
        <?php if (session()->getFlashdata('flash_msg')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('flash_msg') ?>
            </div>
        <?php endif; ?>
        <div>
            <label for="email">Email:</label>
            <br>
            <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
        </div>
        <br>
        <div>
            <label for="password">Password:</label>
        <br>
        <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
    <!-- Menampilkan validasi form jika ada error -->
    <?php if (isset($validation)): ?>
        <div class="validation-errors">
            <?= $validation->listErrors() ?>
        </div>
        <?php endif; ?>
    </body>
</html>
