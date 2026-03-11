<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions - Kaadaisoft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --secondary: #64748b;
            --dark: #0f172a;
            --dark-lighter: #1e293b;
            --light: #f8fafc;
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
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
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
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
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

        p {
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
            color: #475569;
        }

        .highlight-box {
            background: #eff6ff;
            border-left: 4px solid var(--primary);
            padding: 20px 25px;
            border-radius: 0 12px 12px 0;
            margin: 2rem 0;
        }

        footer {
            text-align: center;
            padding: 40px;
            background: #fff;
            border-top: 1px solid #e2e8f0;
            color: var(--secondary);
            font-weight: 500;
        }

        @media (max-width: 768px) {
            h1 { font-size: 2.2rem; }
            .content-card { padding: 30px; }
            .back-nav { position: static; margin-bottom: 20px; padding: 20px 20px 0; text-align: left; background: var(--dark); }
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
            <h1 class="animate__animated animate__fadeInDown">Terms and Conditions</h1>
            <p class="text-white-50">Legal agreement for using Poondurai Kaadai Kulam platform</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="content-card">
                    <span class="last-updated">Last Updated: <?= date('F d, Y') ?></span>

                    <div class="highlight-box">
                        <p class="m-0 fw-bold text-primary">Please read these terms and conditions carefully before using our services. By using our platform, you agree to comply with and be bound by these terms.</p>
                    </div>

                    <h2>1. Agreement to Terms</h2>
                    <p>By accessing or using our website, you agree to be bound by these Terms and Conditions and our Privacy Policy. If you do not agree with any part of these terms, you must not use our services. This agreement constitutes a legally binding contract between you and Kaadaisoft.</p>

                    <h2>2. User Registration</h2>
                    <p>To access certain features of the website, you are required to register for an account. You agree to provide accurate, current, and complete information during the registration process (Aadhar, Mobile Number, Address, etc.) and to update such information to keep it accurate, current, and complete.</p>

                    <h2>3. Responsibility for Account</h2>
                    <p>You are solely responsible for maintaining the confidentiality of your account password and for all activities that occur under your account. You agree to notify us immediately of any unauthorized use of your account or any other breach of security.</p>

                    <h2>4. Use of Information</h2>
                    <p>The information provided on this platform is for community management and membership purposes. While we strive to maintain high data accuracy, we do not warrant the completeness or reliability of user-submitted information at all times.</p>

                    <h2>5. Prohibited Activities</h2>
                    <p>You agree not to use the platform for any unlawful purpose or any purpose prohibited under these Terms. Prohibited activities include but are not limited to: uploading false documents, attempting to breach security, or harassing other community members.</p>

                    <h2>6. Intellectual Property</h2>
                    <p>All content included on this website, such as custom scripts, branding, UI designs, and logos, is the property of Poondurai Kaadai Kulam or its content suppliers and is protected by copyright laws.</p>

                    <h2>7. Termination of Use</h2>
                    <p>We reserve the right to terminate or suspend your access to the platform without notice, for any conduct that we, in our sole discretion, believe is in violation of any applicable law or is harmful to the interests of the community.</p>

                    <h2>8. Changes to Terms</h2>
                    <p>We reserve the right to modify these Terms and Conditions at any time. Changes will be effective immediately upon posting. Your continued use of the website following changes will mean that you accept and agree to the modified terms.</p>

                    <h2>9. Contact Support</h2>
                    <p>If you have any questions about these Terms and Conditions, please contact the administrator via the official community channels.</p>
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
