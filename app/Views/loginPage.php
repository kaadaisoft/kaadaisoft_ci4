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
            color: #FFD700;
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
            border-color: #6c5ce7;
            box-shadow: 0 0 0 0.2rem rgba(108, 92, 231, 0.3);
            background: rgba(255, 255, 255, 1);
            transform: translateY(-1px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #6c5ce7 0%, #a55eea 100%);
            border: none;
            border-radius: 25px;
            width: 120px;
            height: 48px;
            font-weight: 700;
            font-size: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(108, 92, 231, 0.5);
            margin-top: 8px;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a4dbf 0%, #933fdc 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(108, 92, 231, 0.6);
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
        }
    </style>
</head>

<body>
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
                        <p class="error"><?php if (isset($usererror)) {
                            echo $usererror;
                        } else {
                            echo ' ';
                        } ?></p>
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="unique" value="<?php if (isset($password)) {
                            echo $password;
                        } ?>"
                            id="password" name="password" placeholder="Enter your Password">
                        <p class="error"><?php if (isset($passworderror)) {
                            echo $passworderror;
                        } ?></p>
                    </div>

                    <button type="submit" name="save" value="Submit"
                        class="btn btn-primary btn-block mt-2">Login</button>
                </form>

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

    <!-- Rejection Modal -->
    <div class="modal fade" id="rejectionModal" tabindex="-1" role="dialog" aria-labelledby="rejectionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"
                style="border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                <div class="modal-header"
                    style="background: #ff6b6b; color: white; border-radius: 20px 20px 0 0; border: none;">
                    <h5 class="modal-title fw-bold" id="rejectionModalLabel">Application Rejected</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="text-center mb-3">
                        <i class="fas fa-times-circle text-danger" style="font-size: 3rem;"></i>
                    </div>
                    <p class="text-dark fw-bold mb-2">your registration account has been rejected for this reason.</p>
                    <div class="p-3 bg-light rounded" style="border-left: 5px solid #ff6b6b;">
                        <span class="fw-bold text-muted d-block mb-1">Reason for Rejection:</span>
                        <p class="mb-0 text-dark" style="font-size: 1.1rem;">
                            <?php if (isset($rejectreason)) {
                                echo $rejectreason;
                            } ?></p>
                    </div>
                    <p class="mt-3 text-muted small">Please contact the administrator for more information or try
                        registering again with the correct details.</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary rounded-pill px-4"
                        data-dismiss="modal">Close</button>
                    <a href="<?php echo base_url('members/registrationform'); ?>"
                        class="btn btn-primary rounded-pill px-4">Register Again</a>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($rejectreason)): ?>
        <script>
            // Moved to bottom after jQuery
        </script>
    <?php endif; ?>

    <!-- All Original JavaScript Functions - 100% Unchanged -->
    <script>
        function isNumberKey(evt) {
            var charCode = evt.which ? evt.which : evt.keyCode;
            if (charCode < 48 || charCode > 57) {
                return false;
            }
            return true;
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const username = document.getElementById('username');
            const password = document.getElementById('password');

            form.addEventListener('submit', function (e) {
                let isValid = true;



                if (username.value.trim() === "") {
                    displayError(username, "Username cannot be empty.");
                    isValid = false;
                } else {
                    clearError(username);
                }

                if (password.value.trim() === "") {
                    displayError(password, "Password cannot be empty.");
                    isValid = false;
                } else {
                    clearError(password);
                }

                if (!isValid) {
                    e.preventDefault();
                }
            });

            function displayError(input, message) {
                let errorElement = input.nextElementSibling;
                if (errorElement && errorElement.classList.contains('error')) {
                    errorElement.textContent = message;
                }
            }

            function clearError(input) {
                let errorElement = input.nextElementSibling;
                if (errorElement && errorElement.classList.contains('error')) {
                    errorElement.textContent = "";
                }
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php if (isset($rejectreason)): ?>
        <script>
            $(document).ready(function () {
                $('#rejectionModal').modal('show');
            });
        </script>
    <?php endif; ?>
</body>

</html>
