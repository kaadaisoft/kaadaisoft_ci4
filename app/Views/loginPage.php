<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Poondurai Kaadai Kulam</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #38bdf8;
            --primary-hover: #7dd3fc;
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --text-color: #ffffff;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevent scrolling */
            font-family: 'Poppins', sans-serif;
            background-color: #0f172a;
        }

        .login-wrapper {
            position: relative;
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .login-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .login-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center 20%; /* Frame perfectly around the gopuram */
            filter: brightness(1.1) contrast(1.05); /* Increased brightness */
        }

        .login-wrapper::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, rgba(15, 23, 42, 0.02) 0%, rgba(15, 23, 42, 0.2) 100%); /* Minimal overlay */
            z-index: 2;
        }

        .login-main-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 450px;
            padding: 20px;
            animation: containerAppear 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes containerAppear {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.01); /* Near total transparency */
            backdrop-filter: blur(2px); /* Very minimal blur so image is clear */
            -webkit-backdrop-filter: blur(2px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 30px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .logo-box {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo-box img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 2px solid var(--primary);
            padding: 5px;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.4);
        }

        .login-title {
            font-weight: 800; /* Extra Bold */
            margin-bottom: 30px;
            color: var(--text-color);
            font-size: 1.8rem;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.8); /* Stronger shadow for readability */
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group-custom label {
            font-weight: 700; /* Bold */
            color: #ffffff;
            margin-left: 5px;
            margin-bottom: 8px;
            font-size: 0.9rem;
            display: block;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.8);
        }

        .input-icon-wrapper {
            position: relative;
        }

        .input-icon-wrapper i:not(.password-toggle) {
            position: absolute;
            right: 20px; /* Moved to right like image */
            top: 50%;
            transform: translateY(-50%);
            color: #ffffff;
            font-size: 1rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.9); /* Added shadow for icon clarity */
            z-index: 5;
        }

        .unique {
            border-radius: 40px; 
            padding: 12px 50px 12px 25px; 
            border: 2px solid rgba(255, 255, 255, 0.8); /* Brighter, more solid border */
            background: rgba(0, 0, 0, 0.4); /* Darker tint to make white text pop */
            outline: none;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 1.05rem;
            color: #ffffff;
            font-weight: 700; /* Extra bold text */
            text-shadow: 0 2px 4px rgba(0, 0, 0, 1); /* Very sharp text shadow */
        }

        .unique::placeholder {
            color: rgba(255, 255, 255, 0.9); /* Much brighter/clearer placeholder */
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.9);
        }

        .unique:focus {
            border-color: #ffffff;
            background: rgba(255, 255, 255, 0.1);
        }

        /* Prevent background color change on browser autofill */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus, 
        input:-webkit-autofill:active{
            -webkit-box-shadow: 0 0 0 30px rgba(0, 0, 0, 0.6) inset !important;
            -webkit-text-fill-color: white !important;
            transition: background-color 5000s ease-in-out 0s;
        }

        .password-toggle {
            position: absolute;
            right: 45px; /* Shifted for lock icon on far right */
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #ffffff;
            font-size: 0.9rem;
            z-index: 10;
            opacity: 0.7;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .btn-primary {
            background: #ffffff;
            color: #000000;
            border: none;
            border-radius: 40px; /* Pill shape */
            width: 100%;
            height: 50px;
            font-weight: 700;
            font-size: 1.1rem;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: scale(1.02);
            color: #000000;
        }

        .login-options {
            display: flex;
            justify-content: flex-end; /* Align Forgot Password to the right */
            margin-bottom: 20px;
            color: #fff;
            font-size: 0.85rem;
            padding: 0 10px;
        }

        .login-options label {
            margin: 0;
            cursor: pointer;
            font-weight: 500;
            text-shadow: none;
        }

        .footer-links {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #fff;
        }

        .footer-links a {
            color: #fff !important;
            font-weight: 700;
            text-decoration: none;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .legal-links {
            position: absolute;
            bottom: 20px;
            left: 0;
            width: 100%;
            z-index: 10;
            text-align: center;
        }

        .legal-links a {
            color: #ffffff !important;
            font-size: 0.9rem;
            margin: 0 10px;
            text-decoration: none;
            font-weight: 600;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.9);
            opacity: 1; /* Solid white for clarity */
        }

        .legal-links a:hover {
            text-decoration: underline;
            color: #ffffff !important;
        }

        .copyright-text {
            margin-top: 10px;
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 600;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.9);
            opacity: 0.9; /* Higher visibility */
        }

        /* MUI Alert Styles */
        .mui-alert-container {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10000;
            width: 100%;
            max-width: 400px;
            padding: 0 20px;
            pointer-events: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .mui-alert {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            border-radius: 12px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2);
            pointer-events: auto;
            animation: muiSlideIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            transition: all 0.3s ease;
            font-family: inherit;
        }

        @keyframes muiSlideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .mui-alert-icon {
            margin-right: 12px;
            font-size: 20px;
            display: flex;
            align-items: center;
        }

        .mui-alert-message {
            flex-grow: 1;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .mui-alert-close {
            margin-left: 8px;
            cursor: pointer;
            font-size: 18px;
            opacity: 0.6;
            background: transparent;
            border: none;
            color: inherit;
        }

        .mui-alert-success { background: #edf7ed; color: #1e4620; }
        .mui-alert-error { background: #fdeded; color: #5f2120; }
        .mui-alert-warning { background: #fff4e5; color: #663c00; }
        .mui-alert-info { background: #e5f6fd; color: #014361; }

        @media (max-height: 700px) {
            .login-container {
                padding: 25px 30px;
            }
            .logo-box {
                margin-bottom: 15px;
            }
            .logo-box img {
                width: 70px;
                height: 70px;
            }
            .login-title {
                font-size: 1.4rem;
                margin-bottom: 15px;
                line-height: 1.2;
            }
            .input-group-custom {
                margin-bottom: 15px;
            }
        }

        @media (max-width: 480px), (max-height: 600px) {
            .login-main-container {
                padding: 10px;
            }
            .login-container {
                padding: 25px 15px;
                border-radius: 20px;
            }
            .logo-box {
                margin-bottom: 10px;
            }
            .logo-box img {
                width: 55px;
                height: 55px;
            }
            .login-title {
                font-size: 1.15rem;
                margin-bottom: 15px;
                line-height: 1.2;
            }
            .input-group-custom {
                margin-bottom: 12px;
            }
            .unique {
                padding: 10px 40px 10px 20px;
                font-size: 0.95rem;
            }
            .input-icon-wrapper i:not(.password-toggle) {
                right: 15px;
            }
            .password-toggle {
                right: 35px;
            }
            .btn-primary {
                height: 45px;
                font-size: 1rem;
                margin-top: 5px;
            }
            .login-options {
                margin-bottom: 12px;
                font-size: 0.8rem;
            }
            .footer-links {
                margin-top: 15px;
                font-size: 0.85rem;
            }
            .legal-links {
                bottom: 10px;
            }
            .legal-links a {
                font-size: 0.75rem;
                margin: 0 5px;
                display: inline-block;
            }
            .copyright-text {
                font-size: 0.7rem;
                margin-top: 5px;
            }
        }
    </style>
</head>

<body>
    <div id="mui-alert-container" class="mui-alert-container"></div>
    <div class="login-wrapper">
        <!-- Full Screen Background Image -->
        <div class="login-image">
            <img src="<?= base_url('assets/perumal kovil.png') ?>" alt="Kaadaisoft Temple">
        </div>

        <!-- Transparent Login Container -->
        <div class="login-main-container">
            <div class="login-container">
                <div class="logo-box">
                    <img src="<?= base_url('assets/poondurai kaadaikulam image.png') ?>" alt="Logo">
                </div>
                <h2 class="login-title">Poondurai Kaadai Kulam</h2>

                <form method="post" action="<?= base_url('login') ?>">
                    <div class="input-group-custom">
                        <div class="input-icon-wrapper">
                            <input type="text" class="unique" id="username" name="username"
                                value="<?= $username ?? '' ?>"
                                placeholder="Username" onkeypress="return isNumberKey(event)"
                                maxlength="12">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>

                    <div class="input-group-custom">
                        <div class="input-icon-wrapper">
                            <input type="password" class="unique" value="<?= $password ?? '' ?>"
                                id="password" name="password" placeholder="Password">
                            <i class="fa-solid fa-lock"></i>
                            <i class="fa-solid fa-eye password-toggle" id="togglePassword"></i>
                        </div>
                    </div>

                    <div class="login-options">
                        <a href="<?= base_url('forgot-password') ?>" style="color: #fff; text-decoration: none;">Forgot password?</a>
                    </div>

                    <button type="submit" name="save" value="Submit" class="btn btn-primary">Login</button>
                </form>

                <div class="footer-links">
                    Don't have an account? <a href="<?= base_url('members/registrationform') ?>">Register</a>
                </div>
            </div>
        </div>

        <!-- Move legal links outside the container -->
        <div class="legal-links">
            <a href="<?= base_url('terms-and-conditions') ?>">Terms & Conditions</a>
            <a href="<?= base_url('privacy-policy') ?>">Privacy Policy</a>
            <div class="copyright-text">
                © <?= date('Y') ?> Poondurai Kaadai Kulam. All rights reserved.
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function isNumberKey(evt) {
            var charCode = evt.which ? evt.which : evt.keyCode;
            if (charCode < 48 || charCode > 57) {
                return false;
            }
            return true;
        }

        // Toggle Password Visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const username = document.getElementById('username');
            const password = document.getElementById('password');

            form.addEventListener('submit', function (e) {
                if (username.value.trim() === "") {
                    e.preventDefault();
                    showMuiAlert('warning', '<strong>Mobile Number Required</strong><br>Please enter your Mobile Number.');
                    return;
                }

                if (password.value.trim() === "") {
                    e.preventDefault();
                    showMuiAlert('warning', '<strong>Password Required</strong><br>Please enter your password.');
                    return;
                }
            });

            // MUI Alert Function
            window.showMuiAlert = function(type, message, duration = 5000) {
                const container = document.getElementById('mui-alert-container');
                const alert = document.createElement('div');
                alert.className = `mui-alert mui-alert-${type}`;
                
                let icon = '';
                if (type === 'success') icon = '<i class="fa-solid fa-circle-check"></i>';
                else if (type === 'error') icon = '<i class="fa-solid fa-circle-xmark"></i>';
                else if (type === 'warning') icon = '<i class="fa-solid fa-triangle-exclamation"></i>';
                else icon = '<i class="fa-solid fa-circle-info"></i>';

                alert.innerHTML = `
                    <div class="mui-alert-icon">${icon}</div>
                    <div class="mui-alert-message">${message}</div>
                    <button class="mui-alert-close" onclick="closeMuiAlert(this.parentElement)">&times;</button>
                `;

                container.appendChild(alert);

                if (duration > 0) {
                    setTimeout(() => {
                        closeMuiAlert(alert);
                    }, duration);
                }
            };

            window.closeMuiAlert = function(alertElement) {
                alertElement.style.opacity = '0';
                alertElement.style.transform = 'translateY(-10px)';
                setTimeout(() => alertElement.remove(), 300);
            };

            // Handle Server Side Errors
            <?php if (isset($usererror)): ?>
                showMuiAlert('error', '<strong>Login Error</strong><br><?= addslashes($usererror) ?>');
            <?php endif; ?>

            <?php if (isset($passworderror)): ?>
                showMuiAlert('error', '<strong>Invalid Password</strong><br><?= addslashes($passworderror) ?>');
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                showMuiAlert('error', '<strong>Error</strong><br><?= addslashes(session()->getFlashdata('error')) ?>');
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                showMuiAlert('success', '<strong>Success</strong><br><?= addslashes(session()->getFlashdata('success')) ?>');
            <?php endif; ?>

            <?php if (isset($rejectreason)): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Application Rejected',
                    html: `<div class="text-start">
                        <p>Your registration account has been rejected for the following reason:</p>
                        <div class="p-3 bg-light rounded border-start border-danger border-4 mb-3">
                            <strong>Reason:</strong> <?= addslashes($rejectreason) ?>
                        </div>
                        <p class="small text-muted">Please contact the administrator or try registering again with correct details.</p>
                    </div>`,
                    showCancelButton: true,
                    confirmButtonText: 'Register Again',
                    cancelButtonText: 'Close',
                    confirmButtonColor: '#007bff',
                    cancelButtonColor: '#aaa'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '<?= base_url('members/registrationform') ?>';
                    }
                });
            <?php endif; ?>
        });
    </script>
</body>

</html>
