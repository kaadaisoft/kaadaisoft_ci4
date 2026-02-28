<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Kaadaisoft</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            min-height: 120vh;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .login-wrapper {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .login-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 150vh;
            z-index: 1;
        }

        .login-image img {
            width: 100%;
            height: 90%;
            object-fit: cover;
            object-position: center;
        }

        .login-main-container {
            position: relative;
            z-index: 2;
            min-height: 130vh;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 550px;
            padding: 40px 30px;
            /* background: rgba(255, 255, 255, 0.15);  ✅ More transparent */
            /* backdrop-filter: blur(25px); */
            /* -webkit-backdrop-filter: blur(25px); */
            /* border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
            border: 1px solid rgba(255, 255, 255, 0.2); */
        }

        .login-title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 25px;
            color: #007bff;
            font-size: 2.2rem;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }

        label {
            font-weight: 600;
            color: black;
            margin-bottom: 8px;
            display: block;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        }

        .role {
            border-radius: 30px;
            padding: 18px 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.9);
            outline: none;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="%23666" class="bi bi-chevron-down" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/></svg>');
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 15px;
            margin-bottom: 8px;
            color: #333;
        }

        .unique {
            border-radius: 30px;
            padding: 18px 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.9);
            outline: none;
            transition: all 0.3s ease;
            width: 100%;
            font-size: 15px;
            margin-bottom: 8px;
            color: #333;
        }

        .role:focus,
        .unique:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.3);
            background: rgba(255, 255, 255, 1);
            transform: translateY(-1px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            border: none;
            border-radius: 25px;
            width: 120px;
            height: 48px;
            font-weight: 700;
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0, 123, 255, 0.5);
            margin-top: 8px;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3 0%, #004085 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(0, 123, 255, 0.6);
        }

        .text-center a {
            text-decoration: none;
            color: #e8f4fd !important;
            font-weight: 600;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
        }

        .text-center a:hover {
            color: #fff;
        }

        .error {
            padding: 6px 0;
            color: #ff6b6b;
            font-size: 13px;
            font-weight: 500;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.5);
        }

        /* MUI Alert Styles */
        .mui-alert-container {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10000;
            width: 100%;
            max-width: 500px;
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
            border-radius: 4px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            pointer-events: auto;
            animation: muiSlideIn 0.4s ease-out;
            transition: opacity 0.3s ease, transform 0.3s ease, margin 0.3s ease;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
        }

        @keyframes muiSlideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .mui-alert-icon {
            margin-right: 12px;
            font-size: 22px;
            display: flex;
            align-items: center;
        }

        .mui-alert-message {
            flex-grow: 1;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .mui-alert-close {
            margin-left: 8px;
            cursor: pointer;
            font-size: 20px;
            padding: 2px 8px;
            line-height: 1;
            opacity: 0.6;
            transition: opacity 0.2s;
            background: transparent;
            border: none;
            color: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mui-alert-close:hover {
            opacity: 1;
            background: rgba(0, 0, 0, 0.05);
            border-radius: 50%;
        }

        /* MUI Variants - Light Mode Like Website */
        .mui-alert-success {
            background-color: #edf7ed;
            color: #1e4620;
            border: 1px solid #c3e6cb;
        }
        .mui-alert-error {
            background-color: #fdeded;
            color: #5f2120;
            border: 1px solid #f5c6cb;
        }
        .mui-alert-warning {
            background-color: #fff4e5;
            color: #663c00;
            border: 1px solid #ffeeba;
        }
        .mui-alert-info {
            background-color: #e5f6fd;
            color: #014361;
            border: 1px solid #bee5eb;
        }

        @media (max-width: 992px) {
            .login-main-container {
                padding: 20px !important;
                justify-content: center !important;
            }

            .login-container {
                max-width: 420px !important;
                padding: 35px 25px !important;
                margin: 0 auto !important;
            }
        }

        @media (max-width: 768px) {
            .login-main-container {
                padding: 15px !important;
            }

            .login-container {
                max-width: 95% !important;
                padding: 30px 20px !important;
            }

            .btn-primary {
                width: 100% !important;
            }

            .login-title {
                font-size: 1.8rem !important;
            }

            .mui-alert-container {
                top: 10px;
                padding: 0 10px;
            }
        }
    </style>
</head>

<body>
    <div id="mui-alert-container" class="mui-alert-container"></div>
    <div class="login-wrapper">
        <!-- Full Screen Background Image -->
        <div class="login-image">
            <img src="<?= base_url('assets/img/god1.png') ?>" alt="Kaadaisoft Temple">
        </div>

        <!-- Smaller Right Aligned Transparent Login Container -->
        <div class="login-main-container">
            <div class="login-container">
                <h2 class="login-title">Poondurai Kaadai Kulam</h2>

                <form method="post" action="<?= base_url('login') ?>">


                    <div class="form-group mb-3">
                        <label for="username">Mobile Number</label>
                        <input type="text" class="unique" id="username" name="username"
                            value="<?php if (isset($username)) {
                                echo $username;
                            } ?>"
                            placeholder="Enter Mobile Number" onkeypress="return isNumberKey(event)"
                            maxlength="12">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="unique" value="<?php if (isset($password)) {
                            echo $password;
                        } ?>"
                            id="password" name="password" placeholder="Enter your Password">
                    </div>

                    <div class="text-right">
                        <button type="submit" name="save" value="Submit"
                            class="btn btn-primary mt-2">Login</button>
                    </div>
                </form>

                <div class="text-center mt-2">
                    <a href="<?= base_url('forgot-password') ?>" style="color: #000; font-weight: 600;">Forgot Password?</a>
                </div>

                
                <p class="text-center mt-3 mb-0" style="color: #000000ff; font-weight: bold;">
                    Don't have an account? <br>
                    <a href="<?php echo base_url('members/registrationform'); ?>">Create New account</a>
                </p>
                <div class="text-center mt-3">
                    <small style="font-size: 20px;">
                        <a href="<?= base_url('terms-and-conditions') ?>" 
                            style="color: #ffffff !important; text-decoration: underline;">Terms and Conditions</a> |
                        <a href="<?= base_url('privacy-policy') ?>" 
                            style="color: #ffffff !important; text-decoration: underline;">Privacy Policy</a>
                    </small>
                </div>

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
