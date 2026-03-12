<?php if (isset($receipt)): ?>
<div class="p-4">
    <div class="container-fluid rounded shadow-sm border p-4 bg-white">
        <div class="d-flex flex-column justify-content-center">
            <div class="d-flex flex-column justify-content-center border-bottom pb-3 mb-3 text-center">
                <div class="heading-kaadaisoft fs-1">Poondurai Kadai Kulam</div>
                <div class="fw-bold fs-4 text-muted">Receipt</div>
            </div>

            <div class="table-responsive">
                <table class="table table-borderless align-middle">
                    <thead>
                        <tr>
                            <th class="text-secondary fw-bold">உறுப்பினர் விவரம்</th>
                            <th></th>
                            <th class="text-end text-muted small" id="receipt_id_val">சீட்டு எண் : <?= $receipt->id ?? '-' ?></th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-muted small" id="receipt_date_val">
                                தேதி : <?= $receipt->paymentdate ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="printreceipt">
                        <tr>
                            <td style="width: 40%;">பெயர்</td>
                            <td style="width: 5%;">:</td>
                            <td class='fw-bold text-primary'><?= $receipt->Membername ?></td>
                        </tr>
                        <tr>
                            <td>குடும்ப உறுப்பினர் எண்</td>
                            <td>:</td>
                            <td class='fw-bold'><?= $receipt->Familymembershipid ?></td>
                        </tr>
                        <tr>
                            <td>முகவரி</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->Membertaluk ?></td>
                        </tr>
                        <tr>
                            <td>பணம் செலுத்திய முறை</td>
                            <td>:</td>
                            <td class="fw-bold text-success"><?= ucfirst($receipt->paymenttype) ?></td>
                        </tr>
                        <tr>
                            <td>பணம் செலுத்திய தேதி</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->paymentdate ?></td>
                        </tr>
                        <tr>
                            <td>பணம் செலுத்திய வங்கியின் பெயர்</td>
                            <td>:</td>
                            <td class="fw-bold">
                                <?php
                                if (!$receipt->bankname && !$receipt->banknameforcheckque) {
                                    echo "-";
                                } else {
                                    echo $receipt->bankname ?: $receipt->banknameforcheckque;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>வங்கி பரிவர்த்தனை எண்</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->transactionid ?: '-' ?></td>
                        </tr>
                        <tr>
                            <td>காசோலை எண்:</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->checkqueno ?: '-' ?></td>
                        </tr>
                        <tr>
                            <td>UPI பரிவர்த்தனை எண்</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->upitransactionid ?: '-' ?></td>
                        </tr>
                        <tr class="border-top mt-3">
                            <td class="pt-3">இந்த பற்றுச் சீட்டு எந்த நிகழ்ச்சிக்காக கட்டப்பட்டது</td>
                            <td class="pt-3">:</td>
                            <td class="pt-3 fw-bold"><?= $receipt->eventname ?></td>
                        </tr>
                        <tr>
                            <td>செலுத்த வேண்டிய மொத்த தொகை</td>
                            <td>:</td>
                            <td class="fw-bold">₹ <?= number_format($receipt->Taxamount, 2) ?></td>
                        </tr>
                        <tr>
                            <td>தற்போது செலுத்திய தொகை</td>
                            <td>:</td>
                            <td class="fw-bold">₹ <?= number_format($receipt->paidamount, 2) ?></td>
                        </tr>
                        <tr>
                            <td>இதுவரை வசூலிக்கப்பட்ட தொகை</td>
                            <td>:</td>
                            <td class="fw-bold text-primary">₹ <?= number_format($receipt->Collectedamount, 2) ?></td>
                        </tr>
                        <tr>
                            <td>இருப்பு கட்ட வேண்டிய தொகை</td>
                            <td>:</td>
                            <td class="fw-bold text-danger">₹ <?= number_format($receipt->balanceamount, 2) ?></td>
                        </tr>
                        <tr>
                            <td>பணம் செலுத்தியதை உறுதி செய்தவர்</td>
                            <td>:</td>
                            <td class="fw-bold"><?= $receipt->receivedby ?: '-' ?></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="py-5 text-muted italic" style="text-align: right;">
                                <div>மேலாளர் கையொப்பம்</div>
                                <div class="small">Manager Signature</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="alert alert-warning m-4">Receipt details not found.</div>
<?php endif; ?>

<style>
    .heading-kaadaisoft {
        color: rgb(0, 123, 255);
        font-weight: 800;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .table td {
        padding: 8px 0;
    }
</style>
