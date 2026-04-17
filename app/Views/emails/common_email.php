<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

        @media print {
            body { 
                background-color: #ffffff !important; 
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
            .main-container { padding: 0 !important; }
            .content-card { 
                max-width: 100% !important; 
                box-shadow: none !important; 
                border-radius: 0 !important; 
                border: none !important;
            }
            .inner-content { padding: 20px 0 !important; }
            .logo-section { padding-bottom: 15px !important; }
            .logo-img { width: 60px !important; height: 60px !important; }
            .title-text { font-size: 20px !important; margin-bottom: 1px !important; }
            .subtitle-text { font-size: 14px !important; margin-top: 2px !important; }
            .message-table { margin-top: 20px !important; }
            .greeting-text { font-size: 16px !important; margin-bottom: 10px !important; }
            .message-body { font-size: 14px !important; line-height: 1.4 !important; }
            .highlight-table { margin: 15px 0 !important; }
            .highlight-box { padding: 15px !important; border-radius: 12px !important; }
            .highlight-box div { font-size: 28px !important; }
            .cta-table { margin: 20px 0 !important; }
            .extra-info-box { margin-top: 15px !important; padding: 12px !important; font-size: 13px !important; }
            .contact-section { margin-top: 20px !important; padding-top: 15px !important; }
            .footer-section { margin-top: 20px !important; padding-top: 15px !important; }
            .footer-text { font-size: 11px !important; line-height: 1.3 !important; }
            p { margin-bottom: 5px !important; }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; font-family: 'Outfit', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: <?= $bg_color ?? '#f1f5f9' ?>; color: #334155; -webkit-font-smoothing: antialiased;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: <?= $bg_color ?? '#f1f5f9' ?>;">
        <tr>
            <td align="center" class="main-container" style="padding: 20px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-card" style="max-width: 600px; background-color: #ffffff; border-radius: 20px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
                    
                    <!-- Top Accent Bar -->
                    <tr>
                        <td style="background: <?= $primary_color ?? '#16a34a' ?>; height: 10px;"></td>
                    </tr>

                    <tr>
                        <td class="inner-content" style="padding: 40px 30px;">
                            <!-- Logo Section -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" class="logo-section" style="padding-bottom: 30px;">
                                        <div style="background-color: #ffffff; padding: 10px; border-radius: 50%; display: inline-block;">
                                            <img src="<?= $logo_url ?>" alt="Organization Logo" class="logo-img" width="80" height="80" style="display: block; object-fit: contain;">
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <!-- Header Section -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center">
                                        <h1 class="title-text" style="margin: 0; color: #0f172a; font-size: 26px; font-weight: 700; line-height: 1.2; letter-spacing: -0.02em;">
                                            <?= $title ?>
                                        </h1>
                                        <?php if(isset($subtitle)): ?>
                                            <p class="subtitle-text" style="margin: 10px 0 0; color: #64748b; font-size: 16px; font-weight: 400;">
                                                <?= $subtitle ?>
                                            </p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>

                            <!-- Body Section -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="message-table" style="margin-top: 35px;">
                                <tr>
                                    <td style="color: #475569; font-size: 16px; line-height: 1.6;">
                                        <?php if (isset($name)): ?>
                                            <p class="greeting-text" style="margin: 0 0 15px; font-size: 18px; color: #1e293b; font-weight: 600;">Dear <?= $name ?>,</p>
                                        <?php endif; ?>
                                        
                                        <div class="message-body" style="margin-bottom: 25px;">
                                            <?= $message ?>
                                        </div>

                                        <!-- Highlight Box (OTP, Membership ID, etc.) -->
                                        <?php if (isset($highlight_box)): ?>
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="highlight-table" style="margin: 30px 0;">
                                                <tr>
                                                    <td align="center" class="highlight-box" style="padding: 30px; background-color: <?= $highlight_bg ?? '#f8fafc' ?>; border-radius: 16px; border: 1px dashed <?= $primary_color ?? '#16a34a' ?>;">
                                                        <?php if (isset($highlight_label)): ?>
                                                            <p style="margin: 0 0 10px; font-size: 13px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;"><?= $highlight_label ?></p>
                                                        <?php endif; ?>
                                                        <div style="font-size: 36px; font-weight: 800; color: <?= $primary_color ?? '#16a34a' ?>; letter-spacing: 6px; margin: 5px 0;"><?= $highlight_box ?></div>
                                                        <?php if (isset($highlight_subtext)): ?>
                                                            <p style="margin: 10px 0 0; font-size: 14px; color: #64748b; font-weight: 500;"><?= $highlight_subtext ?></p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endif; ?>

                                        <!-- Call to Action -->
                                        <?php if (isset($button_url)): ?>
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="cta-table" style="margin: 35px 0;">
                                                <tr>
                                                    <td align="center">
                                                        <a href="<?= $button_url ?>" target="_blank" style="display: inline-block; background: <?= $primary_color ?? '#16a34a' ?>; color: #ffffff; padding: 14px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                                                            <?= $button_text ?? 'Get Started' ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endif; ?>

                                        <?php if (isset($extra_info)): ?>
                                            <div class="extra-info-box" style="margin-top: 30px; padding: 20px; border-radius: 12px; background-color: <?= $extra_bg ?? '#f0f9ff' ?>; border-left: 6px solid <?= $extra_border ?? '#0891b2' ?>; font-size: 15px; color: <?= $extra_color ?? '#0e7490' ?>; line-height: 1.5;">
                                                <?= $extra_info ?>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Contact Info Section -->
                                        <?php if (isset($contact_address) || isset($contact_email)): ?>
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="contact-section" style="margin-top: 40px; border-top: 1px solid #e2e8f0; padding-top: 30px;">
                                                <tr>
                                                    <td style="color: #475569; font-size: 14px;">
                                                        <p style="margin: 0 0 15px; font-weight: 700; color: #1e293b; text-transform: uppercase; letter-spacing: 0.05em;">Contact Information</p>
                                                        <?php if (isset($contact_address)): ?>
                                                            <p style="margin: 0 0 8px; display: flex; align-items: center;">
                                                                <span style="font-weight: 600; color: #334155; min-width: 70px; display: inline-block;">Address:</span> <?= $contact_address ?>
                                                            </p>
                                                        <?php endif; ?>
                                                        <?php if (isset($contact_phone)): ?>
                                                            <p style="margin: 0 0 8px; display: flex; align-items: center;">
                                                                <span style="font-weight: 600; color: #334155; min-width: 70px; display: inline-block;">Phone:</span> <?= $contact_phone ?>
                                                            </p>
                                                        <?php endif; ?>
                                                        <?php if (isset($contact_email)): ?>
                                                            <p style="margin: 0 0 8px; display: flex; align-items: center;">
                                                                <span style="font-weight: 600; color: #334155; min-width: 70px; display: inline-block;">Email:</span> <?= $contact_email ?>
                                                            </p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" class="footer-section" style="margin-top: 40px; border-top: 1px solid #e2e8f0; padding-top: 30px;">
                                <tr>
                                    <td align="center" class="footer-text" style="color: #94a3b8; font-size: 13px; line-height: 1.5;">
                                        <p style="margin: 0 0 10px;">If you have any questions, please contact your local coordinator.</p>
                                        <p style="margin: 0;">&copy; <?= date('Y') ?> <b>Poondurai Kaadai Kulam</b>. All rights reserved.</p>
                                        <!-- Hidden unique ID to prevent email threading/clipping issues -->
                                        <div style="display:none; font-size:1px; color:#ffffff; line-height:1px; max-height:0px; max-width:0px; opacity:0; overflow:hidden;">
                                            Reference: <?= uniqid() ?>-<?= time() ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
