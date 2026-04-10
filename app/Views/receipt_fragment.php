<?php if (isset($receipt)): ?>
<!-- Premium Receipt Fragment -->
<div id="printable-receipt" class="receipt-slip-fragment">
    <div class="receipt-header">
        <img src="<?= base_url('assets/poondurai kaadaikulam image.png') ?>" alt="Logo" class="receipt-logo">
        <span class="receipt-brand">Poondurai Kadai Kulam</span>
        <span class="receipt-title">Payment Receipt</span>
    </div>

    <div class="receipt-meta">
        <span>சீட்டு எண் / Bill No: <strong><?= $receipt->id ?></strong></span>
        <span>தேதி / Date: <strong><?= date('d-m-Y', strtotime($receipt->paymentdate)) ?></strong></span>
    </div>

    <table class="receipt-table">
        <tbody>
            <tr>
                <td class="receipt-label">பெயர் / Name</td>
                <td class="receipt-value"><?= $receipt->Membername ?></td>
            </tr>
            <tr>
                <td class="receipt-label">உறுப்பினர் எண் / ID</td>
                <td class="receipt-value"><?= $receipt->Familymembershipid ?></td>
            </tr>
            <tr>
                <td class="receipt-label">முகவரி / Address</td>
                <td class="receipt-value"><?= $receipt->Membertaluk ?></td>
            </tr>
            <tr>
                <td class="receipt-label">நிகழ்ச்சி / Event</td>
                <td class="receipt-value"><?= $receipt->eventname ?></td>
            </tr>
            <tr>
                <td class="receipt-label">வகை / Type</td>
                <td class="receipt-value"><?= strtoupper($receipt->paymenttype) ?></td>
            </tr>
            
            <?php if ($receipt->paymenttype != 'cash'): ?>
                <tr>
                    <td class="receipt-label">வங்கி / Bank</td>
                    <td class="receipt-value">
                        <?php
                        $display_bank = $receipt->bankname != "" ? $receipt->bankname : ($receipt->banknameforcheckque != "" ? $receipt->banknameforcheckque : "-");
                        echo $display_bank;
                        if ($display_bank == "Other Bank" && !empty($receipt->other_bank_name)) {
                            echo " (" . $receipt->other_bank_name . ")";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="receipt-label">பரிவர்த்தனை ID / Ref</td>
                    <td class="receipt-value">
                        <?= $receipt->transactionid ?: ($receipt->checkqueno ?: ($receipt->upitransactionid ?: "-")) ?>
                    </td>
                </tr>
            <?php endif; ?>

            <tr>
                <td class="receipt-label">மொத்த தொகை / Total</td>
                <td class="receipt-value">₹<?= number_format($receipt->Taxamount, 2) ?></td>
            </tr>
            
            <tr class="receipt-total-row">
                <td class="receipt-label receipt-total-label">தற்போதைய கட்டணம் / Current Paid</td>
                <td class="receipt-value receipt-total-value">₹<?= number_format($receipt->paidamount, 2) ?></td>
            </tr>

            <tr>
                <td class="receipt-label">மொத்தமாக செலுத்தியது / Total Collected</td>
                <td class="receipt-value">₹<?= number_format($receipt->Collectedamount, 2) ?></td>
            </tr>

            <tr>
                <td class="receipt-label">இருப்பு தொகை / Balance</td>
                <td class="receipt-value <?= $receipt->balanceamount == 0 ? 'text-success' : 'text-danger' ?>">₹<?= number_format($receipt->balanceamount, 2) ?></td>
            </tr>
            
            <tr>
                <td class="receipt-label">பெறப்பட்டவர் / Agent</td>
                <td class="receipt-value"><?= $receipt->receivedby ?></td>
            </tr>
        </tbody>
    </table>

    <div class="receipt-footer">
        <div class="signature-box">
            <div class="signature-line">
                மேலாளர் கையொப்பம்<br>
                Manager Signature
            </div>
        </div>
    </div>
</div>

<style>
    /* Premium Receipt Styles - Shared between Modal and Page */
    .receipt-slip-fragment {
        max-width: 100%;
        margin: 0 auto;
        background: #ffffff;
        padding: 20px;
        position: relative;
        font-family: 'Outfit', sans-serif;
    }

    /* Override for Modal context */
    .modal-body .receipt-slip-fragment {
        padding: 30px;
    }

    .receipt-header {
        text-align: center;
        border-bottom: 2px dashed #e2e8f0;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .receipt-logo {
        width: 60px;
        height: 60px;
        margin-bottom: 10px;
    }

    .receipt-brand {
        font-size: 1.4rem;
        font-weight: 800;
        color: #2563eb;
        margin-bottom: 5px;
        display: block;
    }

    .receipt-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .receipt-meta {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
        font-size: 0.85rem;
        color: #64748b;
        margin-bottom: 20px;
        font-weight: 500;
        background: #f8fafc;
        padding: 8px 12px;
        border-radius: 6px;
    }

    .receipt-table {
        width: 100%;
        border-collapse: collapse;
    }

    .receipt-table tr {
        border-bottom: 1px solid #f1f5f9;
    }

    .receipt-table tr:last-child {
        border-bottom: none;
    }

    .receipt-table td {
        padding: 10px 0;
        vertical-align: top;
        font-size: 0.95rem;
    }

    .receipt-label {
        color: #64748b;
        font-weight: 500;
        width: 45%;
        padding-right: 10px !important;
    }

    .receipt-value {
        color: #0f172a;
        font-weight: 700;
        text-align: right;
    }

    .receipt-total-row {
        border-top: 2px dashed #e2e8f0 !important;
        border-bottom: 2px dashed #e2e8f0 !important;
        margin-top: 10px;
        background: #f8fafc;
    }

    .receipt-total-label {
        font-size: 1rem;
        font-weight: 800;
        color: #2563eb;
    }

    .receipt-total-value {
        font-size: 1.1rem;
        font-weight: 800;
        color: #2563eb;
    }

    .receipt-footer {
        margin-top: 30px;
        text-align: right;
    }

    .signature-box {
        display: inline-block;
        text-align: center;
        min-width: 150px;
    }

    .signature-line {
        border-top: 1px solid #0f172a;
        margin-top: 30px;
        padding-top: 5px;
        font-size: 0.8rem;
        font-weight: 600;
        color: #64748b;
    }

    /* Print Styles */
    @media print {
        header, footer, nav, aside, .no-print, #captureArea { display: none !important; }
        body { background: white !important; margin: 0 !important; padding: 0 !important; -webkit-print-color-adjust: exact; }
        body * { visibility: hidden; }
        
        #printable-receipt, #printable-receipt * { visibility: visible; }
        
        #printable-receipt {
            display: block !important;
            position: fixed !important;
            left: 50% !important;
            top: 0 !important;
            transform: translateX(-50%) !important;
            width: 420px !important;
            background: white !important;
            border: none !important;
            box-shadow: none !important;
            margin: 0 !important;
            padding: 20px !important;
        }

        @page {
            size: auto;
            margin: 0;
        }
    }
</style>


<?php else: ?>
    <div class="alert alert-warning m-4">Receipt details not found.</div>
<?php endif; ?>
