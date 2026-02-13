<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Kaadaisoft</title>
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
            <a href="javascript:history.back()" class="back-btn">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </nav>

    <div class="header-section">
        <div class="container">
            <h1>Privacy Policy</h1>
            <p>Your privacy is important to us. Learn how we handle your data.</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="content-card">
                    <p>Last Updated: <?= date('F d, Y') ?></p>

                    <h2>1. Information We Collect</h2>
                    <p>We collect information you provide directly to us when you register for an account, including your name, contact details, address, and document images (Aadhar, Photo, etc.) for community verification purposes.</p>

                    <h2>2. How We Use Your Information</h2>
                    <p>We use the information we collect to:</p>
                    <ul>
                        <li>Provide, maintain, and improve our services.</li>
                        <li>Verify community membership and approvals.</li>
                        <li>Communicate with you about updates, announcements, and events.</li>
                        <li>Ensure compliance with our terms and policies.</li>
                    </ul>

                    <h2>3. Sharing of Information</h2>
                    <p>We do not share your personal information with third parties, except as required by law or to protect our rights. Within the community platform, certain details may be visible to administrators and coordinators for verification and community management.</p>

                    <h2>4. Data Security</h2>
                    <p>We implement reasonable security measures to protect your personal information from unauthorized access, use, or disclosure. However, no method of transmission over the internet is 100% secure.</p>

                    <h2>5. Your Rights</h2>
                    <p>You have the right to access, update, or delete your personal information. You can do this by logging into your account or contacting our support team.</p>

                    <h2>6. Cookies</h2>
                    <p>We may use cookies to enhance your experience on our website. You can choose to set your web browser to refuse cookies, but some parts of the website may not function properly.</p>

                    <h2>7. Changes to This Privacy Policy</h2>
                    <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>

                    <h2>8. Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy, please contact our administrator.</p>
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
