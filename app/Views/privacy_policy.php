<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Kaadaisoft</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3b82f6;
            --primary-light: #eff6ff;
            --dark: #0f172a;
            --dark-lighter: #1e293b;
            --slate: #475569;
        }

        body {
            background-color: #f1f5f9;
            color: #334155;
            font-family: 'Outfit', sans-serif;
            line-height: 1.7;
            margin: 0;
            padding: 0;
        }

        .header-section {
            background: linear-gradient(135deg, var(--dark), var(--dark-lighter));
            padding: 80px 0 120px;
            color: white;
            text-align: center;
            position: relative;
        }

        .header-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(to top, #f1f5f9, transparent);
        }

        h1 {
            font-weight: 800;
            font-size: 3rem;
            margin-bottom: 1rem;
            letter-spacing: -1px;
        }

        .content-card {
            background: white;
            border-radius: 24px;
            padding: 50px;
            margin-top: -80px;
            margin-bottom: 60px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(226, 232, 240, 0.8);
            position: relative;
            z-index: 10;
        }

        h2 {
            color: var(--dark);
            font-weight: 700;
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        h2::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 24px;
            background: var(--primary);
            border-radius: 4px;
        }

        .last-updated {
            font-weight: 600;
            color: var(--primary);
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
            margin-bottom: 2rem;
            display: block;
        }

        .back-nav {
            position: absolute;
            top: 30px;
            left: 30px;
            z-index: 20;
        }

        .back-btn {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none !important;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .back-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transform: translateX(-5px);
        }

        ul {
            padding-left: 1.25rem;
            margin-bottom: 1.5rem;
        }

        li {
            margin-bottom: 0.75rem;
            color: var(--slate);
        }

        .policy-item {
            background: var(--primary-light);
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 2rem;
        }

        footer {
            text-align: center;
            padding: 40px;
            color: var(--slate);
            font-weight: 500;
        }

        @media (max-width: 768px) {
            h1 { font-size: 2.2rem; }
            .content-card { padding: 30px; }
            .back-nav { position: static; margin-bottom: 20px; padding: 20px 20px 0; background: var(--dark); }
            .header-section { padding-top: 40px; }
        }
    </style>
</head>
<body>

    <div class="header-section">
        <div class="back-nav">
            <a href="<?= base_url() ?>" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i> Back to Login
            </a>
        </div>
        <div class="container text-center">
            <h1>Privacy Policy</h1>
            <p class="text-white-50">Your privacy and data security are our top priorities.</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="content-card">
                    <span class="last-updated">Last Updated: <?= date('F d, Y') ?></span>

                    <p>At **Poondurai Kaadai Kulam**, we are committed to protecting your personal data and ensuring that your privacy is respected. This policy explains how we collect, use, and safeguard your information.</p>

                    <div class="policy-item">
                        <h2>1. Information We Collect</h2>
                        <p>We collect information you provide directly to us when you register for an account, including:</p>
                        <ul>
                            <li><strong>Personal Identity:</strong> Full name, Aadhar number, and photographs.</li>
                            <li><strong>Contact Details:</strong> Mobile number and physical address.</li>
                            <li><strong>Community Data:</strong> Family membership details and role assignments.</li>
                        </ul>
                    </div>

                    <h2>2. How We Use Your Information</h2>
                    <p>The information we collect is strictly used for community management purposes:</p>
                    <ul>
                        <li>Verifying community membership and user authenticity.</li>
                        <li>Processing tax payments and generating official receipts.</li>
                        <li>Coordinating community events and member updates.</li>
                        <li>Maintaining a secure and transparent community registry.</li>
                    </ul>

                    <h2>3. Data Sharing & Disclosure</h2>
                    <p>We do not sell, trade, or rent your personal information to third parties. Your data is only visible to authorized platform administrators and coordinators for verification purposes within the Poondurai Kaadai Kulam community ecosystem.</p>

                    <h2>4. Security Measures</h2>
                    <p>We implement a variety of security measures to maintain the safety of your personal information. Your data is stored on secure servers and access is restricted to authorized personnel only. While we strive for absolute security, please note that no method of digital storage is 100% impenetrable.</p>

                    <h2>5. Your Data Rights</h2>
                    <p>You have the right to access and update your information at any time. If you wish to correct your data or request account closure, you can manage your profile settings or contact the administrator directly.</p>

                    <h2>6. Cookies & Tracking</h2>
                    <p>Our platform may use essential session cookies to keep you logged in and ensure the website functions correctly. We do not use tracking cookies for advertising purposes.</p>

                    <h2>7. Changes to This Policy</h2>
                    <p>We may update this Privacy Policy to reflect changes in our practices. Any updates will be posted on this page with an updated "Last Updated" date.</p>

                    <h2>8. Contact Our Team</h2>
                    <p>If you have any questions or concerns regarding this Privacy Policy or your data, please reach out to the platform administrator.</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p class="m-0">&copy; <?= date('Y') ?> Poondurai Kaadai Kulam. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
