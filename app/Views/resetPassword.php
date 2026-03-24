<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Kaadaisoft</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        body { background-color: #f0f2f5; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .reset-container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .btn-primary { background: linear-gradient(135deg, #6c5ce7 0%, #a55eea 100%); border: none; border-radius: 25px; padding: 12px; font-weight: bold; width: 100%; }
        .form-control { border-radius: 25px; padding: 25px 20px; }
        .password-field { position: relative; }
        .password-toggle { position: absolute; right: 20px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #6c757d; }
    </style>
</head>
<body>
    <div class="reset-container text-center">
        <h3 class="mb-4">Reset Password</h3>
        <p class="text-muted">Enter your new password.</p>
        <form action="<?= base_url('update-password') ?>" method="POST">
            <input type="hidden" name="identifier" value="<?= $identifier ?>">
            <input type="hidden" name="token" value="<?= $token ?>">
            <div class="form-group password-field">
                <input type="password" name="password" id="password" class="form-control" placeholder="New Password" required>
                <i class="fa-solid fa-eye-slash password-toggle" onclick="togglePassword('password', this)"></i>
            </div>
            <div class="form-group password-field">
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" required>
                <i class="fa-solid fa-eye-slash password-toggle" onclick="togglePassword('confirm_password', this)"></i>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Reset Password</button>
        </form>
    </div>

    <script>
        function togglePassword(inputId, icon) {
            const input = document.getElementById(inputId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }

        document.querySelector('form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('confirm_password').value;
            if (password !== confirm) {
                e.preventDefault();
                Swal.fire({ icon: 'error', title: 'Error', text: 'Passwords do not match!' });
            }
        });

        <?php if (session()->getFlashdata('error')): ?>
            Swal.fire({ icon: 'error', title: 'Error', text: '<?= session()->getFlashdata('error') ?>' });
        <?php endif; ?>
    </script>
</body>
</html>
