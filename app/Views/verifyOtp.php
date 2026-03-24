<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - Kaadaisoft</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { background-color: #f0f2f5; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .verify-container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .btn-primary { background: linear-gradient(135deg, #6c5ce7 0%, #a55eea 100%); border: none; border-radius: 25px; padding: 12px; font-weight: bold; width: 100%; }
        .form-control { border-radius: 25px; padding: 25px 20px; text-align: center; font-size: 24px; letter-spacing: 10px; }
    </style>
</head>
<body>
    <div class="verify-container text-center">
        <h3 class="mb-4">Verify OTP</h3>
        <p class="text-muted">Enter the 6-digit OTP sent to your registered email.</p>
        <form action="<?= base_url('verify-otp') ?>" method="POST">
            <input type="hidden" name="identifier" value="<?= $identifier ?>">
            <div class="form-group">
                <input type="text" name="otp" class="form-control" maxlength="6" pattern="\d{6}" placeholder="000000" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Verify OTP</button>
        </form>
        <div class="mt-4">
            <a href="<?= base_url('forgot-password') ?>" class="text-muted">Resend OTP</a>
        </div>
    </div>

    <script>
        <?php if (session()->getFlashdata('error')): ?>
            Swal.fire({ icon: 'error', title: 'Error', text: '<?= session()->getFlashdata('error') ?>' });
        <?php endif; ?>
    </script>
</body>
</html>
