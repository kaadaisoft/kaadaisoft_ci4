<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');
    </style>
</head>
<body style="margin: 0; padding: 0; font-family: 'Outfit', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: <?= $bg_color ?? '#f1f5f9' ?>; color: #334155; -webkit-font-smoothing: antialiased;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: <?= $bg_color ?? '#f1f5f9' ?>;">
        <tr>
            <td align="center" style="padding: 40px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 20px; overflow: hidden; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
                    
                    <!-- Top Accent Bar -->
                    <tr>
                        <td style="background: <?= $primary_color ?? '#38bdf8' ?>; height: 10px;"></td>
                    </tr>

                    <tr>
                        <td style="padding: 40px 30px;">
                            <!-- Logo Section -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom: 30px;">
                                        <div style="background-color: #ffffff; padding: 10px; border-radius: 50%; display: inline-block;">
                                            <img src="<?= $logo_url ?>" alt="Organization Logo" width="80" height="80" style="display: block; object-fit: contain;">
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <!-- Header Section -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td align="center">
                                        <h1 style="margin: 0; color: #0f172a; font-size: 26px; font-weight: 700; line-height: 1.2; letter-spacing: -0.02em;">
                                            <?= $title ?>
                                        </h1>
                                        <?php if(isset($subtitle)): ?>
                                            <p style="margin: 10px 0 0; color: #64748b; font-size: 16px; font-weight: 400;">
                                                <?= $subtitle ?>
                                            </p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>

                            <!-- Body Section -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 35px;">
                                <tr>
                                    <td style="color: #475569; font-size: 16px; line-height: 1.6;">
                                        <?php if (isset($name)): ?>
                                            <p style="margin: 0 0 15px; font-size: 18px; color: #1e293b; font-weight: 600;">Dear <?= $name ?>,</p>
                                        <?php endif; ?>
                                        
                                        <div style="margin-bottom: 25px;">
                                            <?= $message ?>
                                        </div>

                                        <!-- Highlight Box (OTP, Membership ID, etc.) -->
                                        <?php if (isset($highlight_box)): ?>
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 30px 0;">
                                                <tr>
                                                    <td align="center" style="padding: 30px; background-color: <?= $highlight_bg ?? '#f8fafc' ?>; border-radius: 16px; border: 1px dashed <?= $primary_color ?? '#38bdf8' ?>;">
                                                        <?php if (isset($highlight_label)): ?>
                                                            <p style="margin: 0 0 10px; font-size: 13px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.1em;"><?= $highlight_label ?></p>
                                                        <?php endif; ?>
                                                        <div style="font-size: 36px; font-weight: 800; color: <?= $primary_color ?? '#38bdf8' ?>; letter-spacing: 6px; margin: 5px 0;"><?= $highlight_box ?></div>
                                                        <?php if (isset($highlight_subtext)): ?>
                                                            <p style="margin: 10px 0 0; font-size: 14px; color: #64748b; font-weight: 500;"><?= $highlight_subtext ?></p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endif; ?>

                                        <!-- Call to Action -->
                                        <?php if (isset($button_url)): ?>
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 35px 0;">
                                                <tr>
                                                    <td align="center">
                                                        <a href="<?= $button_url ?>" target="_blank" style="display: inline-block; background: <?= $primary_color ?? '#38bdf8' ?>; color: #ffffff; padding: 14px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);">
                                                            <?= $button_text ?? 'Get Started' ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endif; ?>

                                        <?php if (isset($extra_info)): ?>
                                            <div style="margin-top: 30px; padding: 15px; border-radius: 10px; background-color: #f0f9ff; border-left: 4px solid #0891b2; font-size: 14px; color: #0e7490;">
                                                <?= $extra_info ?>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>

                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 40px; border-top: 1px solid #e2e8f0; padding-top: 30px;">
                                <tr>
                                    <td align="center" style="color: #94a3b8; font-size: 13px; line-height: 1.5;">
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
