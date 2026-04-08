<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - Kaadaisoft</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { background-color: #f0f2f5; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .verify-container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        .btn-primary { background: linear-gradient(135deg, #6c5ce7 0%, #a55eea 100%); border: none; border-radius: 25px; padding: 12px; font-weight: bold; width: 100%; }
        .form-control { border-radius: 25px; padding: 25px 20px; text-align: center; font-size: 24px; letter-spacing: 10px; }
        .resend-link { color: #6c5ce7; font-weight: 500; text-decoration: none; cursor: pointer; transition: all 0.3s; }
        .resend-link.disabled { color: #ccc; cursor: not-allowed; pointer-events: none; }
        #timer { font-weight: bold; color: #6c5ce7; }
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
            <a id="resend-btn" href="<?= base_url('resend-otp/' . $identifier) ?>" class="resend-link">Resend OTP</a>
            <div id="timer-container" class="mt-2 text-muted small" style="display: none;">
                Resend available in <span id="timer">60</span>s
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            startResendTimer();
        });

        function startResendTimer() {
            const resendBtn = document.getElementById('resend-btn');
            const timerContainer = document.getElementById('timer-container');
            const timerSpan = document.getElementById('timer');
            let timeLeft = 60;

            // Disable button
            resendBtn.classList.add('disabled');
            timerContainer.style.display = 'block';

            const countdown = setInterval(function() {
                timeLeft--;
                timerSpan.textContent = timeLeft;

                if (timeLeft <= 0) {
                    clearInterval(countdown);
                    resendBtn.classList.remove('disabled');
                    timerContainer.style.display = 'none';
                    resendBtn.textContent = 'Resend OTP';
                }
            }, 1000);
        }
    </script>
    <?= view('notification_toast') ?>
</body>
</html>
