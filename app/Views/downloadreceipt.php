<!DOCTYPE html>
<html lang="ta">
<head>
    <meta charset="UTF-8">
    <title>Payment Receipt</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/poondurai kaadaikulam image.png') ?>">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Tamil:wght@400;700&display=swap');
        
        @page { margin: 20px; }
        body {
            font-family: 'Noto Sans Tamil', 'DejaVu Sans', sans-serif;
            font-size: 13px;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 10px;
            margin-bottom: 30px;
        }
        .modal-header-text {
            color: #0d6efd;
            font-size: 18px;
            font-weight: bold;
            text-align: left;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .main-brand {
            color: #0d6efd;
            font-size: 40px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 20px 0;
        }
        .receipt-info {
            width: 100%;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .info-row {
            clear: both;
            width: 100%;
            margin-bottom: 10px;
        }
        .info-left {
            float: left;
            width: 50%;
            font-weight: bold;
        }
        .info-right {
            float: right;
            width: 50%;
            text-align: right;
            font-weight: bold;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .data-table td {
            padding: 8px 4px;
            vertical-align: top;
        }
        .label {
            width: 40%;
        }
        .separator {
            width: 5%;
        }
        .value {
            width: 55%;
            font-weight: bold;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        .signature-box {
            display: inline-block;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="modal-header-text">Payment Receipt</div>
        
        <div class="header">
            <div class="main-brand">Poondurai Kadai Kulam</div>
        </div>

        <?php if(isset($receipt)): ?>
        <div class="info-row">
            <div class="info-left">உறுப்பினர் விவரம்</div>
            <div class="info-right">சீட்டு எண் : <?= $receipt->id ?></div>
        </div>
        <div class="info-row" style="margin-bottom: 25px;">
            <div class="info-left">தேதி : <?= $receipt->paymentdate ?></div>
        </div>

        <table class="data-table">
            <tr>
                <td class="label">பெயர்</td>
                <td class="separator">:</td>
                <td class="value" style="color: #0d6efd;"><?= $receipt->Membername ?></td>
            </tr>
            <tr>
                <td class="label">குடும்ப உறுப்பினர் எண்</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->Familymembershipid ?></td>
            </tr>
            <tr>
                <td class="label">முகவரி</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->Membertaluk ?></td>
            </tr>
            <tr>
                <td class="label">பணம் செலுத்திய முறை</td>
                <td class="separator">:</td>
                <td class="value" style="color: #198754; font-weight: bold;"><?= $receipt->paymenttype ?></td>
            </tr>
            <tr>
                <td class="label">பணம் செலுத்திய தேதி</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->paymentdate ?></td>
            </tr>
            <tr>
                <td class="label">பணம் செலுத்திய வங்கியின் பெயர்</td>
                <td class="separator">:</td>
                <td class="value">
                    <?php
                    $display_bank = $receipt->bankname ?: $receipt->banknameforcheckque;
                    if ($display_bank == "") {
                        echo "-";
                    } else {
                        echo $display_bank;
                        if ($display_bank == "Other Bank" && !empty($receipt->other_bank_name)) {
                            echo " (" . $receipt->other_bank_name . ")";
                        }
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td class="label">வங்கி பரிவர்த்தனை எண்</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->transactionid ?: "-" ?></td>
            </tr>
            <tr>
                <td class="label">காசோலை எண்</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->checkqueno ?: "-" ?></td>
            </tr>
            <tr>
                <td class="label">UPI பரிவர்த்தனை எண்</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->upitransactionid ?: "-" ?></td>
            </tr>
            <tr>
                <td class="label">இந்த பற்றுச் சீட்டு எந்த நிகழ்ச்சிக்காக கட்டப்பட்டது</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->eventname ?></td>
            </tr>
            <tr>
                <td class="label">செலுத்த வேண்டிய மொத்த தொகை</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->Taxamount ?> Rs</td>
            </tr>
            <tr>
                <td class="label">தற்போது செலுத்திய தொகை</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->paidamount ?> Rs</td>
            </tr>
            <tr>
                <td class="label">இதுவரை வசூலிக்கப்பட்ட தொகை</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->Collectedamount ?> Rs</td>
            </tr>
            <tr>
                <td class="label">இருப்பு கட்ட வேண்டிய தொகை</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->balanceamount ?> Rs</td>
            </tr>
            <tr>
                <td class="label">பணம் செலுத்தியதை உறுதி செய்தவர்</td>
                <td class="separator">:</td>
                <td class="value"><?= $receipt->receivedby ?></td>
            </tr>
        </table>

        <div class="footer">
            <div class="signature-box">
                <div>மேலாளர் கையொப்பம்</div>
                <div style="font-size: 11px; color: #888;">Manager Signature</div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
