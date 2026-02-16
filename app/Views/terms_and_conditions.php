<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - Kaadaisoft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
        }
        .navbar {
            background: linear-gradient(135deg, #795548 0%, #3E2723 100%);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 800;
            color: white !important;
            font-size: 1.5rem;
        }
        .content-card {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            margin-top: -50px;
            margin-bottom: 3rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: none;
        }
        .header-section {
            background: linear-gradient(135deg, #795548 0%, #3E2723 100%);
            height: 200px;
            color: white;
            padding-top: 3rem;
            text-align: center;
        }
        h1 {
            font-weight: 800;
            margin-bottom: 1rem;
        }
        h2 {
            color: #3E2723;
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            border-left: 4px solid #795548;
            padding-left: 1rem;
        }
        .back-btn {
            color: white;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            transition: transform 0.2s;
        }
        .back-btn:hover {
            color: #f8f9fa;
            transform: translateX(-5px);
        }
        footer {
            text-align: center;
            padding: 2rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">Kaadaisoft</a>
            <a href="<?= base_url() ?>" class="back-btn">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </nav>

    <div class="header-section">
        <div class="container">
            <h1>Terms and Conditions</h1>
            <p>Please read these terms carefully before using our services.</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="content-card">
                    <p>Last Updated: <?= date('F d, Y') ?></p>

                    <h2>1. Agreement to Terms</h2>
                    <p>By accessing or using our website, you agree to be bound by these Terms and Conditions and our Privacy Policy. If you do not agree with any part of these terms, you must not use our services.</p>

                    <h2>2. User Registration</h2>
                    <p>To access certain features of the website, you may be required to register for an account. You agree to provide accurate, current, and complete information during the registration process and to update such information to keep it accurate, current, and complete.</p>

                    <h2>3. Responsibility for Account</h2>
                    <p>You are responsible for maintaining the confidentiality of your account password and for all activities that occur under your account. You agree to notify us immediately of any unauthorized use of your account.</p>

                    <h2>4. Use of Information</h2>
                    <p>The information provided on this website is for general membership and community purposes. While we strive for accuracy, we do not warrant the completeness or reliability of the information.</p>

                    <h2>5. Prohibited Activities</h2>
                    <p>You agree not to use the website for any unlawful purpose or any purpose prohibited under these Terms. You agree not to use the website in any way that could damage, disable, overburden, or impair the website.</p>

                    <h2>6. Intellectual Property</h2>
                    <p>All content included on this website, such as text, graphics, logos, images, and software, is the property of Kaadaisoft or its content suppliers and is protected by international copyright laws.</p>

                    <h2>7. Termination of Use</h2>
                    <p>We reserve the right to terminate or suspend your access to all or part of the website, without notice, for any conduct that we, in our sole discretion, believe is in violation of any applicable law or is harmful to the interests of another user or us.</p>

                    <h2>8. Changes to Terms</h2>
                    <p>We reserve the right to change these Terms and Conditions at any time. Your continued use of the website following the posting of changes will mean that you accept and agree to the changes.</p>

                    <h2>9. Contact Us</h2>
                    <p>If you have any questions about these Terms and Conditions, please contact us through the provided support channels.</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> Kaadaisoft. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
